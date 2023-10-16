# SPA with Laravel using Breeze and Blade Template

Welcome to the SPA (Single Page Application) project I've built using Laravel and Blade template, focused on deepening your understanding of SPA architecture. In this project, I utilize Laravel with Breeze as the authentication scaffold to create a seamless and intuitive web application. The primary features of this project are as follows:

## Features

1. **Authentication**

    - **Login:** Users can securely log in to their accounts.
    - **Register:** New users can create an account by providing essential information.

2. **Profile Configuration**

    - **Change Email:** Registered users have the ability to update their email addresses.
    - **Change Name:** Users can modify their display names.
    - **Change Password:** Users can update their passwords for enhanced security.

3. **CRUD Categories**

    - **Create:** Users can create new categories.
    - **Read:** View the list of existing categories.
    - **Update:** Modify category names or details.
    - **Delete:** Remove categories when they are no longer needed.

4. **CRUD Posts**
    - **Create:** Users can publish new posts with associated categories.
    - **Read:** View a list of posts, including their titles, content, and the corresponding categories.
    - **Update:** Modify post content or titles.
    - **Delete:** Remove posts as required.

## Getting Started

1. **Clone the Repository**

    ```bash
    git clone https://github.com/H7mei/Laravel-SPA-DeepDive
    cd Laravel-SPA-DeepDive
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Set Up Your Environment**

    - Duplicate the `.env.example` file and name it `.env`.
    - Configure your database connection settings in the `.env` file.

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Migrate the Database And run seed**

    ```bash
    php artisan migrate:fresh --seed
    ```

6. **Compile JavaScript Assets**

    ```bash
    npm run dev
    ```

7. **Run the Development Server**
    ```bash
    php artisan serve
    ```

Your Laravel SPA project is now up and running. You can access it at [http://localhost:8000](http://localhost:8000) in your web browser.

Including the step to compile JavaScript assets is important to ensure that any JavaScript code or dependencies used in your project are properly processed and ready for the application to function as expected.

## Technologies Used

-   Laravel
-   Breeze Authentication
-   Blade Template Engine
-   MySQL Database

## Feedback and Contributions

If you encounter any issues or have suggestions for improving this project, please don't hesitate to open an issue or submit a pull request. We welcome your feedback and contributions to make this project even better!

Enjoy exploring SPA architecture with Laravel and Breeze in this project!
