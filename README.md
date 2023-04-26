# Cnam Book 2023
It's a project dedicated for web development (NFA042) students at Cnam Bickfaya - 2023

# Introduction
The project is a library website that is designed in two main sections: a public section that is accessible to all users, and an admin section that is only accessible to authorized administrators.
In the public section of the website, users can browse the library's collection of books by category or author, search for books by title,
short description, or author, and get in touch with the library using a contact form. Users can also register for an account to start borrowing books and accessing other features of the library.
In the admin section of the website, authorized administrators can manage all aspects of the library, including adding, editing, and deleting authors, books, and registered users. The admin section also includes a login page where administrators can securely access the admin area of the website.
This project is a great way for students to learn about building dynamic web applications using PHP and how to implement CRUD (create, read, update, and delete) functionality for different types of data. It also gives students an opportunity to learn about web security and how to implement user authentication and authorization for an admin area.

# User Information
## Introduction
The information that you should save about the users who register and buy books on "Cnam Book" includes:Name: The user's first and last name.Email Address: The user's email address, which you can use to communicate with them about their purchases or other important updates.Username and Password: The username and password that the user chooses to register with your website.Shipping/Billing Address: The user's shipping and/or billing address, which is necessary if you're going to be shipping physical books to them.Payment Information: The user's payment information, such as their credit card number, which you'll need in order to process their purchases.
It's important to note that when collecting and storing user data, you should always adhere to best practices for data security and privacy. This includes using encryption to protect sensitive information and only collecting the information that is necessary for your business needs. Additionally, you should always obtain the user's consent before collecting and using their personal information.

## Registration
The registration form should have the below fields:
* First Name (required)
* Last Name (required)
* Email Address (required)
* Mobile Number (required)
* Birthdate (optional)
* Username (required)
* Password (required)
* Confirm Password (required)
* Shipping Address
  * Street Address (required)
  * City (required)
  * State/Province/Region
  * ZIP/Postal Code
  * Country (required)
* Billing Address (if different from shipping address)
  * Street Address (required)
  * City (required)
  * State/Province/Region
  * ZIP/Postal Code
  * Country (required)
* Payment Information
  * Credit card number
  * Name on card
  * Expiration date
  * CVV