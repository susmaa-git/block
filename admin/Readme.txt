
1. Download frontend backend template

2. extract frontend and backend template into backend structure

index.html -> dashboard.php
page-login.html -> index.php
page-regiter.html -> register.php

create folders such as:
users
    create.php   -> form
    index.php       -> data tables
    edit.php
    view.php
    delete.php

create database:

and makes tables on MYSQL 

connection 

auth
register
login
logout


CRUD 
users
files
abouts






database name: Porfolio

tables:
users
id | name | username | phone | email | password | status | created_at | updated_at

files
id | title | description | img_link | type | status | created_at | updated_at

abouts*
id  | top_title | top_desc | title | description | img  | status | created_at | updated_at

skills
id | title | desc | status | created_at | updated_at

facts
id | numbers | title | | status | created_at | updated_at

testimonials*
id | img | name | position | message | status | created_at | updated_at

resume_titles
id | title | status | created_at | updated_at

resume*
id | resume_titles_id | title | start_date | end_date | com_name| description  | status | created_at | updated_at

services
id | icon | title | description | status | created_at | updated_at

portifolios*
id | img | category_id | client | proj_name | proj_url | desc  | status | created_at | updated_at

categories
id | title |desc |  status | created_at | updated_at

contacts
id | name | subject | email  | message | status | created_at | updated_at

settings ( site_key always fixed)
id | site_key | site_value | status | created_at | updated_at