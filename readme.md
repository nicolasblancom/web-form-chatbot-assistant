# Web Form Chatbot Assistant

## What is this?

This an experiment, using ChatGPT API. 

It's a web chatbot assistant, intended to replace the usual contact form to hire a service (an ecommerce development for example) where you have to choose options before sending it.

The Chatbot is already instructed to assist the user to select options, and will ask for everything it needs based on user answers.

---

## Setup/Installation

**Requirements:**

- Docker installed. https://docs.docker.com/engine/install
- OpenAI API token. https://help.openai.com/en/articles/4936850-where-do-i-find-my-secret-api-key
- Rename .env-example file to .env and place your OpenAI API token there

---

## Build Docker image and run it

- clone this repo
- `docker build . -t webchatbot` (you can name your image another way, I used here "webchatbot")
- `docker run -p 8080:80 webchatbot`

To stop containers: ctrl+c or if you run containers in detached mode with `docker run -d -p 8080:80 webchatbot`, run `docker stop [container-id]` (get the container id with `docker ps | grep webchatbot)

## Usage

Visit http://localhost:8080/

You will see a typical chat interface where you can write something in the input that is at the bottom of the screen,
and the chat messages will appear on top of it.

The prompt needs some tweaks, but it makes the job: it will ask some questions to find out what services you need 
of a hypothetical company that offers web services as ecommerce web development. In the prompt
it has been provided with a list of services and instructions.

Once the conversation has lead it to fulfill all of the answers, it will try to end the conversation.

## Final thoughts

There are plenty of tools that make you a chatbot. But I was very interested in knowing how the chatbot managed messages from users and how the chatbot managed the entire "conversation" (I mean the entire context of all the messages from the first one).

There is a lot of things that can be refactored or improved but the main purpose was to play with it and learn :)