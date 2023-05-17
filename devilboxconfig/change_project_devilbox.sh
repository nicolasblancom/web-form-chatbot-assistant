#!/usr/bin/env bash

## edit this!!
project_name="webformchatbot"
## end editing. Do not edit anything below this comment

devilbox_dir_path="$HOME/devilbox";
projects_dir_path="$HOME/www-projects";
this_project_dir_path="$projects_dir_path/$project_name";
this_project_devilboxconfig_dir_path="$this_project_dir_path/devilboxconfig";

rm -f "$devilbox_dir_path/_start.sh";
rm -f "$devilbox_dir_path/.env";
rm -f "$devilbox_dir_path/docker-compose.override.yml";

ln -s "$this_project_devilboxconfig_dir_path/_start.sh" "$devilbox_dir_path/_start.sh";
ln -s "$this_project_devilboxconfig_dir_path/.env" "$devilbox_dir_path/.env";
## we do not need docker-compose.override.yml in this project, just leave it commented
# ln -s "$this_project_devilboxconfig_dir_path/docker-compose.override.yml" "$devilbox_dir_path/docker-compose.override.yml";

bash "$devilbox_dir_path/_start.sh";