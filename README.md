# Product Manager

This application allows you to manage different types of products (Books, DVDs, and Furniture) by adding, viewing, and deleting them. The backend is powered by PHP and MySQL, while the frontend is built with React. This project leverages Object-Oriented Programming (OOP) principles to provide a clean and maintainable codebase.

## Table of Contents

- [Project Overview](#project-overview)
- [Features](#features)
- [Getting Started](#getting-started)
- [Object-Oriented Programming](#object-oriented-programming)
- [API Endpoints](#api-endpoints)
- [Frontend Components](#frontend-components)

## Project Overview

The Product Manager application is designed to help you manage your inventory of products. You can add new products, view a list of all products, and delete selected products. The backend handles CRUD operations and serves as an API for the frontend to interact with.

## Features

- Add new products (Books, DVDs, Furniture) with specific attributes
- View a list of all products
- Mass delete selected products

## Getting Started

Clone the repository:
git clone git@github.com:bokhuuu/product-manager.git

## Running Locally (XAMPP)

- Ensure that you have XAMPP installed on your local machine
- Place the backend files in the htdocs folder of XAMPP
- Start Apache and MySQL
- Set up your database
- Run the frontend using npm run dev

## Running on DigitalOcean (Production)

- The backend is hosted on a DigitalOcean droplet
- To set up your own instance, deploy a LAMP stack on DigitalOcean and upload the PHP backend to /var/www/html
- Ensure that the backend is correctly configured to communicate with the MySQL database
- Deploy the frontend on Netlify (or another static site host) by running npm run build and connecting it to your GitHub repository
- Update your frontend to point to the API on the DigitalOcean droplet by setting the correct API URL.

## Object-Oriented Programming

This project makes extensive use of OOP principles to create a maintainable and scalable codebase. Key OOP concepts used include:

- Classes and Objects: The Product class serves as an abstract base class for specific product types (Book, DVD, Furniture). Each subclass inherits properties and methods from the Product class and implements its own specific logic.
- Encapsulation: Each class encapsulates its properties and provides public getter and setter methods for accessing and modifying these properties.
- Inheritance: Subclasses (Book, DVD, Furniture) inherit common behavior and properties from the Product class, reducing code duplication.
- Polymorphism: Methods like save and outputDetails are defined in the Product class but are implemented differently in each subclass.

### API Endpoints

The backend provides the following API endpoints:

- POST /api.php: Add a new product
- GET /api.php: Retrieve all products
- DELETE /api.php: Delete selected products

## Frontend Components

- ProductList: Fetches and displays a list of products. Allows selection and mass deletion of products.
- AddProduct: Provides a form for adding new products. Handles form validation and submission to the backend API.
