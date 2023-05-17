# Web Form Chatbot Assistant

## What is this?

This an experiment, using ChatGPT API. 

It's a web chatbot assistant, intended to replace the usual contact form to hire a service (an ecommerce development for example) where you have to choose options before sending it.

Chatbot is already instructed to assist the user to select the correct options, and will ask for everything it needs based on user answers. It will end the chat by creating a file with a summary of the user needs in JSON format (this can later be revised or implement a send email functionality)

---

## Setup Devilbox environment for this project

[Devilbox](https://devilbox.readthedocs.io/en/latest/) is used as a dockerized environment. You have a helper script to setup Devilbox.

**Requirements:**

- Devilbox must be installed in `$HOME/devilbox`
- Project source code must be in `$HOME/www-projects/webformchatbot` (change 'webformchatbot' to whatever you want your project directory to be, it will also define the domain you will use)
    - set that directory as Devilbox project url in `etc/hosts` (add the line ``)
- The helper script will remove `devilbox/.env` and `devilbox/docker-compose.override.yml` so make sure to backup them before executing the helper script

**How to easy setup Devilbox environment with helper script**

- Backup `devilbox/.env` and `devilbox/docker-compose.override.yml` (they will be removed)
- In a console, move to your project directory (for example: `webformchatbot`)
- execute `./devilboxconfig/change_project_devilbox.sh`. Give it execute permissions before doing it if needed. This will:
    - remove `devilbox/.env` and `devilbox/docker-compose.override.yml`
    - set soft links to those removed files from the ones in `./devilboxconfig/.env` and `devilboxconfig/docker-compose.override.yml`
    - creates a helper "start devilbox" script: `devilbox/_start.sh`, and a "stop devilbox" one: `devilbox/_stop.sh`

**Start/Stop devilbox**

Once executed `./devilboxconfig/change_project_devilbox.sh` you can use Devilbox as normally. 

If you want to use helper start/stop scripts just execute from `devilbox` dir:
- `./_start.sh` to start Docker containers
- `./_stop.sh` to stop Docker containers

---

## Usage

Visit `http://webformchatbot.loc` or whatever domain you have set in `/etc/hosts`