# WALL-E Lost N Found
# User Guide Documentation 

<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fprod-ripcut-delivery.disney-plus.net%2Fv1%2Fvariant%2Fdisney%2F333D1922787704885572C2ADCFD30D2F5E9CE1217000E60593C4B648DD322CCF%2Fscale%3FaspectRatio%3D1.78%26format%3Djpeg&f=1&nofb=1&ipt=16ec972fcac7651ae70ea7d21edc6d6ca9a6f9389ec6421de4c29fd2070e6881" alt="Wall-E">

## Login Webpage
- First, login to the website with the correct username and password.
- If the user does not have a username or password, they need to sign up for a username and password
- After user enters their name, email, username, and password, go back to the login page
- Finally, enter the new, correct username and password
---
## Main Webpage
- A welcome page that allows the user to freely view the displayed content
- You can click on either of the 4 linked functions below
- Subscription Service is placed down below to use the UMBC WALL_E Lost N Found
---
## Report Webpage
- After clicking on the link called Report, the user can add a lost item to the registry.
- User will enter: 
    - the item name
    - location of the lost item
    - the type of item
    - detailed scription of the item
    - and the date the item was lost
- Afterwards, click register
- If you would like to go back, you can return to the homepage on the navbar (top of the page).
--- 
## Search Webpage
- Here, the user can view the data table of all lost items reported by other users.
- All the collected data are avaiable with the item id, name, type, description, date of registry, and location lost
---
## Ticket Webpage
- After clicking on the link called Tickets, you can see the current data displayed of every user's ticket.
- Below you can add a ticket to the presented table
- Once you finished submiting the changes either from the add or delete ticket page, go back by clicking on the back arrow button (top left) and refresh the tickets log page to view the changes.
- Note, while you are changing something, you can always stop by clicking on the back arrow button to exit out of the page.
---
## Logout
- Just logout if you wish
- The system will destroy the cookie in the mean time
- You will have to log back in with the correct/saved username and password
---

## ALL HAIL THE CONFIGURATION
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.imgflip.com%2F4%2F85ovve.jpg&f=1&nofb=1&ipt=d9d98f0259bcefa739bced81423c247678c2ebcc6baeb24e22caf29dedeafc0b" alt="praise" width="250" height="250">
- Part of this project would not have been possible without the help of this vital code, which helps the apache reads and sees php as an html script while it's insalling the dependencies
---

```dockerfile
# syntax=docker/dockerfile:1
FROM php:8.1.1-apache

# Install required PHP extensions and tools
RUN apt-get update && apt-get install -y \
    libpng-dev \
    && docker-php-ext-install mysqli pdo pdo_mysql \
    && docker-php-ext-enable mysqli

# Enable Apache mod_rewrite (optional but useful for PHP apps)
RUN a2enmod rewrite

# Keep This (Very Important)
RUN echo "AddType application/x-httpd-php .html" >> /etc/apache2/apache2.conf

# Copy your source code
COPY . /var/www/html

# Convert any Windows line endings to Linux line endings (prevents bash\r errors)
RUN apt-get install -y dos2unix && \
    find /var/www/html -type f -print0 | xargs -0 dos2unix || true

WORKDIR /var/www/html
```

---
---
## SDLC of WALL-E Lost N Found
- ### Planning
    - Throughout the planning phase, we have decided on creating a UMBC Lost N Found with WALL-E as our mascot
    - We determined the cost and benefit analysis, feasibility analysis, a system request, and a methodology for our project
    - Created our main GitHub that contains our project plan board
- ### Analysis
    - The use-case consisted of our login page, report for lost item, tickets to get lost item, search to see lost items, and a logout page
    - Wrote the requirements that are necessary for our applications
    - Included interviews and obesvation notes to perform an anaylsis of our project
    - Created a docker and our sql database to get ready for our design/implementation
- ### Design
    - Made a sql script to start inserting the necessary data like the username and password, lost items
    - Designed our an architecture diagram of our network, database, security, and monitoring of our WALL-E Lost N Found
    - Listed the necessary hardware needed for our applications to run smoothly. 
- ### Implementation
    - Made a wireframe for our basic outline for our application
    - Developed our UI/UX for our WALL-E Lost N Found
    - Created a functioning program for all of our webpages
    - Implemented VSCode, GitHub, Docker, and Render for our WALL-E Lost N Found application
    - Finally documentated and prepare a demo for our Wall-E Lost N Found
---
<img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%2Fid%2FOIP.0ICTWeDMHcWQT_fUotJglwHaEK%3Fpid%3DApi&f=1&ipt=f42af519a2ebf1f5d464018a5bb9b7a3862511436bd123e6248dc49be86e27cf&ipo=images" alt="bongocat123">

---
## The Team
| Names    |      Email            |       Favorite Subject                        |
| -------- | ----------------------| ----------------------------------------------|
| Jacob    |  jacobs12@umbc.edu    | ...                                           |
| Brian    |  bpark4@umbc.edu      | I guess Information Systems                   |
| Kairav   |  kroy1@umbc.edu       | Information systems🙂                         |
| Ruby     |  rzheng2@umbc.edu     | Coding                                        |
| Charles  |  charlem1@umbc.edu    | IS, Health discussion                         |
| Kerstyn  |  kmyers7@umbc.edu     | Technology anything techy.                    |
---

## Others
1. [More about the team](https://docs.google.com/document/d/1RxHOfnJiuhgOo4wG1rYfx6ivO1J_gSk3vUrxZLQ7-x0/edit?usp=sharing)
1. [Lost and Found Platform](https://github.com/charlem1/The-Wall-Es-Lost-and-Found-Platform.git)
1. [Project Planning Board](https://github.com/users/charlem1/projects/8)
1. [Lost N Found Website](http://localhost:85/login.php)