const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");

searchInput.addEventListener("input", async () => {
  const query = searchInput.value.trim();

  if (query.length < 2) {
    searchResults.innerHTML = ""; // Reset results if search is empty or too short
    return;
  }

  try {
    const response = await fetch(
      `/cinetech/?page=search&query=${encodeURIComponent(query)}`
    );
    const results = await response.json();

    searchResults.innerHTML = results
      .slice(0, 10) // Limit of 10 results
      .map(
        (result) => `
                <a href="?page=detail&type=${result.media_type}&id=${
          result.id
        }" class="search-result">
                    <img src="https://image.tmdb.org/t/p/w92${
                      result.poster_path || ""
                    }" alt="${result.title || result.name}" />
                    <span>${result.title || result.name}</span>
                </a>
            `
      )
      .join("");
  } catch (error) {
    console.error("Erreur de recherche :", error);
    searchResults.innerHTML = "<p>Erreur lors de la recherche.</p>";
  }
});
