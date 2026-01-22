# Rodrigo Colella
# featured-cases
# Featured Cases – WordPress Technical Exercise

## Overview
This project implements a simple WordPress feature to manage and display
featured legal cases for a law firm.

It uses a Custom Post Type with custom meta fields and a basic page template
to render the data on the frontend.

## Features
- Custom Post Type: Featured Case
- Custom fields:
  - Case Type
  - Settlement Amount
- Page template to display a list of featured cases
- Clean, readable PHP using WordPress best practices

## Setup Instructions
1. Copy the `featured-cases` folder into `/wp-content/plugins/`
2. Activate the plugin from the WordPress admin
3. Create at least 3 "Featured Case" posts
4. Create a new Page and assign the template **Featured Cases List**
5. View the page on the frontend

## Notes
This solution avoids external dependencies and focuses on native WordPress APIs
to keep the implementation lightweight and easy to maintain.
