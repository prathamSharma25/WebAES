# WebAES
An AI expert system to automatically evaluate subjective answers submitted in online assessments.

## About WebAES
WebAES (Word Embedding Based Answer Evaluation System) is an AI expert system that enables the automatic evaluation of online subjective tests.

Using a smart word embedding based algorithm, WebAES evaluates the answer responses submitted by students and awards appropriate marks based on the answer expected by the faculty for the same question.

Faculties can create questions with the expected answer and create tests using these questions. Students can take available tests and submit their answers to WebAES. WebAES then evaluates the submitted answers and gives back the results in minutes.

This helps in saving a lot of time and effort for faculties in evaluating assessments by automating the entire process of answer evaluation. WebAES saves time and effort while maintaining reliability in answer evaluation for online assessments.

## Methodologies
Three different approaches were tested for the main logic of this system which is used to evaluate student's responses and award marks appropriately:
1. **Doc2Vec:** A Doc2Vec model was trained using the text8 corpus to generate 50-dimensional vector respresentations of text documents. This trained Doc2Vec model was then used to generate vector representations of the response submitted by the student and the answer expected by the faculty for a particular question. Similarity between the two documents is calculated using cosine similarity measure and marks are awarded based on the similarity score. A major limitation of this approach is that the trained Doc2Vec model is unable to adequately capture dissimilarity between two documents.
2. **BERT Model**: A pre-trained BERT (Bi-directional Encoder Representations from Transformers) model is used to generate vector representations of student's response and faculty's expected answer. Cosine similarity measure is used to determine the similarity score between the two documents and hence the marks scored by the student. This approach achieves better results than the Doc2Vec approach.
3. **LDA + BERT**: To make the previously mentioned approach even more robust, an LDA (Latent Dirichlet Allocation) model is used to extract the topic from a given text document. This LDA model is trained using the text8 corpus and saved for later use. The trained LDA model is then used to determine the topic for the student's response as well as the faculty's expected answer. Only if both topics match, marks are awarded to the student using the previously mentioned approach. This approach achieves best results for the given problem.

---

Pratham Sharma

Student at Vellore Institute of Technology, Vellore, Tamil Nadu, India

Reach out to me: prathams2425@gmail.com

LinkedIn profile: https://www.linkedin.com/in/pratham-sharma-620418178/

Kaggle profile: https://www.kaggle.com/prathamsharma123
