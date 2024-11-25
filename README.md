# 🎥Cinetech

Cinetech is a library of films and series, thanks to a public API available online.🌐

## ⚙️Prerequisites

- 🐘PHP >= 7.4
- 🛢️MySQL/MariaDB
- 🌐A local web server (Laragon, Xampp, WampServer, or other)
- 🎼Composer to manage PHP dependencies
- 🔑A valid API key for [TMDb](https://developers.themoviedb.org/3/getting-started/introduction)

## 🚀Installation of Composer

1. 📦**Install Composer:**
   - If Composer is not already installed, follow [this guide](https://getcomposer.org/download/).

2. ⬇️**Download the project:**
   - Run the following command:
     ```bash
     composer create-project <vendor>/<project-name>
     ```

3. 🛠️**Configure environment variables:**
   - Rename the `.env.example` file to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Fill in the necessary information:
     ```dotenv
     DB_HOST=127.0.0.1
     DB_DATABASE=cinetech
     DB_USERNAME=root
     DB_PASSWORD=root

     TMDB_API_KEY=your_api_key
     ```

4. 💾**Set up the database:**
   - If an SQL file is provided, import it using the following command:
     ```bash
     mysql -u root -p < database.sql
     ```
5. 🌍**Start the local server:**
   - If you’re using tools like Laragon or XAMPP, simply start the server.

## 🛠️Methods and Features

### 1. 📐**MVC Architecture**
The project is built following the **Model-View-Controller (MVC)** design pattern:
- 🗃️**Model**: Handles the data logic and communicates with the database.
- 🖼️**View**: Manages the presentation layer and displays the content to the user.
- 🔁**Controller**: Connects the model and view, processing user requests and returning the appropriate response.

This separation of concerns ensures better scalability, easier maintenance, and reusability of code.

---

### 2. 🎛️**Options and Their Functionalities**

#### 🔍**Search**
- Allows users to search for movies or TV shows by title.
- Sends an AJAX request to fetch real-time results from the external API (TMDB API).
- Features an auto-complete dropdown for suggestions.

#### ⭐**Favorites**
- Users can mark movies or TV shows as "favorites."
- **Options:**
  - ➕Add to favorites: Saves the item in the user's favorites list.
  - ❌Remove from favorites: Deletes the item from the favorites list.
- Uses JavaScript to toggle states dynamically without reloading the page.
- Data is stored in the database for persistence.

#### 📝**Detail Page**
- Displays comprehensive details about a movie or TV show, including:
  - Title, genres, synopsis, director(s) and main cast.
  - Poster and backdrop images.
- Includes a "similar items" section to suggest related content and a comments section where only connected users can reply or write a comment (the user can delete its comment.s).

#### 🔁**Dynamic Content**
- Most pages fetch and display data dynamically from the TMDB API using PHP and cURL.
- Ensures up-to-date information without manual updates.

---

### 3. ✨**Additional Features**
- 📱**Responsive Design:** Fully responsive layout built with CSS and optimized for all screen sizes.
- 🌌**Dark Mode Theme:** Provides a consistent, sleek appearance with neon text and dark backgrounds.
- ❗**Error Handling:**
  - Displays fallback messages or placeholders if data (e.g., images or text) is unavailable.
  - Gracefully handles API errors.
- 🌟**SEO-Friendly URLs:** Clean, user-friendly URLs with query parameters for easy navigation.

---

### 4. 🔁**How Options Work**
#### ⭐**Favorite Button Workflow**
1. User clicks the star icon.
2. JavaScript sends an AJAX request to:
   - `?page=add-favori` to add an item.
   - `?page=remove-favori` to remove an item.
3. The server updates the database accordingly.
4. The button's appearance toggles between filled (favorited) and empty (not favorited).

#### 🔍**Search Workflow**
1. User types into the search bar.
2. JavaScript sends a request to the API endpoint.
3. Results are dynamically injected into the dropdown without refreshing the page.

#### 📝**Detail Page Workflow**
1. User selects a movie or TV show.
2. PHP fetches the item's details using its ID and displays the data.
3. Related items are fetched from the API and displayed below the main content.

---

### 5. 🔧**Customizable Options**
- **API Configuration:** Update the TMDB API key in the `.env` file.
- **Database Credentials:** Configure `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in the `.env` file.
- 🎨**Custom Styling:** Modify `style.css` to change the theme, colors, or layout.

---

This project showcases a functional and dynamic web application using modern web development practices, offering a seamless and engaging user experience.🌟