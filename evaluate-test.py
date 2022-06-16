# Import required libraries and packages
# To handle command line arguments
import sys

# To perform string operations
import string

# Read and write data using CSV files
import pandas as pd

# To perform text preprocessing operations
import nltk

# To remove English language stopwords
from nltk.corpus import stopwords

nltk.download("stopwords")
# Set of English language stopwords
EN_STOPWORDS = set(stopwords.words("english"))
# For text corpus and LDA model
from gensim import corpora, models
import gensim.downloader as api

# For loading pre-trained BERT model
from sentence_transformers import SentenceTransformer

# To determine similarity score
from sklearn.metrics.pairwise import cosine_similarity

# Supress warnings
import warnings

warnings.filterwarnings("ignore")

# Load pre-trained LDA model
lda_model = models.LdaModel.load("WebAES_LDA_Model.model")

# Load text corpus
text8_corpus = api.load("text8")
text8_corpus = [doc for doc in text8_corpus]
# create a list of list of tokens for each dpcument in the text corpus
list_of_list_of_tokens = []
for i in range(len(text8_corpus)):
    # Remove English stopwords from document and tokenize the document
    text8_corpus[i] = [w for w in text8_corpus[i] if w not in EN_STOPWORDS]
    # Add list of tokens of the document to another list (list_of_list_of_tokens)
    list_of_list_of_tokens.append(text8_corpus[i])
# Create a dictionary for LDA using list of list of tokens
dictionary_LDA = corpora.Dictionary(list_of_list_of_tokens)

# Function to preprocess text document
def preprocess(text):
    # Remove punctuations from text and convert to lowercase
    text = text.translate(str.maketrans("", "", string.punctuation)).lower()
    # Remove English stopwords from text
    text = " ".join([w for w in text.split() if not w.lower() in EN_STOPWORDS])
    # Split text to create a list of tokens
    text_tokens = text.split()
    # Return the list of tokens
    return text_tokens


# Function to get the topic probability and index for given text document
def get_topic_prob(text_tokens):
    # Initialise maximum values for topic probabiulity and topic index
    max_prob_topic, max_prob = 0, 0
    # Extract topics from text tokens using pre-trained LDA model
    topic_probs = lda_model[dictionary_LDA.doc2bow(text_tokens)]
    # Determine topic index with highest topic probability
    for topic in topic_probs:
        topic_index, topic_prob = topic[0], topic[1]
        if topic_prob > max_prob:
            max_prob = topic_prob
            max_prob_topic = topic_index
    # Return topic probability and index of most similar topic
    return max_prob_topic, max_prob


# Function to generate embeddings for documents using pre-trained BERT model
def get_bert_embeddings(docs):
    # Load pre-trained BERT model
    BERT_model = SentenceTransformer("bert-base-nli-mean-tokens")
    # Generate vector embeddings for documents
    doc_embeddings = BERT_model.encode(docs)
    # Return document vector embeddings
    return doc_embeddings


# Function to calculate similarityt socre between documents
def similarity(doc_embeddings):
    # Caclculate cosine similarity for documents from vector embeddings generates using BERT model
    sim_score = cosine_similarity([doc_embeddings[0]], doc_embeddings[1:])[0][0]
    # Return cosine similarity score
    return sim_score


# Function to evaluate test for student
def evaluate(expected, response):
    # Get tokens for expected answer
    exp_ans_tokens = preprocess(expected)
    # Get topic index and probability for expected answer
    exp_ans_topic, exp_ans_topic_prob = get_topic_prob(exp_ans_tokens)
    # Get tokens for student's answer
    stu_ans_tokens = preprocess(response)
    # Get topic index and probability for student's answer
    stu_ans_topic, stu_ans_topic_prob = get_topic_prob(stu_ans_tokens)
    # Generate vector embeddings for expected answer and student's response
    docs = [expected, response]
    doc_embeddings = get_bert_embeddings(docs)
    # Calculate similarity score
    sim_score = similarity(doc_embeddings)
    # Award marks only if topic indices match for both texts
    if stu_ans_topic == exp_ans_topic:
        marks = (stu_ans_topic_prob / exp_ans_topic_prob) * sim_score * 10
    else:
        marks = 0
    # Return marks evalauted for the student
    return marks


# Read path to answers file saved by application
answers_file = sys.argv[1]
# Read CSV file
answers_DF = pd.read_csv(answers_file)
# Student's answer and faculty's expected answer for question 1
stu_ans1 = answers_DF["student1"][0]
exp_ans1 = answers_DF["expected1"][0]
# Student's answer and faculty's expected answer for question 1
stu_ans2 = answers_DF["student2"][0]
exp_ans2 = answers_DF["expected2"][0]
# Student's answer and faculty's expected answer for question 1
stu_ans3 = answers_DF["student3"][0]
exp_ans3 = answers_DF["expected3"][0]
# Evaluate answers and get marks scored by students
question1_marks = round(evaluate(exp_ans1, stu_ans1), 2)
question2_marks = round(evaluate(exp_ans2, stu_ans2), 2)
question3_marks = round(evaluate(exp_ans3, stu_ans3), 2)
# Total marks
total = question1_marks + question2_marks + question3_marks
if total < 0:
    total = 0
# Return marks scored to application
print(total)
