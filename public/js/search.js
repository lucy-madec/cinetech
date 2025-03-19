const searchInput = document.getElementById("search-input");
const searchResults = document.getElementById("search-results");

if (searchInput && searchResults) {
  searchInput.addEventListener("input", async () => {
    const query = searchInput.value.trim();

    if (query.length < 2) {
      searchResults.innerHTML = "";
      return;
    }

    try {
      const response = await fetch(
        `/cinetech/?page=search&query=${encodeURIComponent(query)}`
      );
      if (!response.ok) throw new Error("Erreur de recherche");
      
      const results = await response.json();
      
      searchResults.innerHTML = results
        .slice(0, 5)
        .map(
          (result) => `
            <a href="?page=detail&type=${result.media_type}&id=${result.id}" class="search-result-item">
                <img src="https://image.tmdb.org/t/p/w92${result.poster_path || '/cinetech/public/images/no-poster.png'}" 
                     alt="${result.title || result.name}" 
                     onerror="this.src='/cinetech/public/images/no-poster.png'" />
                <span>${result.title || result.name}</span>
            </a>
          `
        )
        .join("");
    } catch (error) {
      console.error("Erreur:", error);
      searchResults.innerHTML = "";
    }
  });

  document.addEventListener('click', (e) => {
    if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
      searchResults.innerHTML = '';
    }
  });
}
