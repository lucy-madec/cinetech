// Script spécifique pour la barre de recherche mobile
const mobileSearchInput = document.getElementById("mobile-search-input");
const mobileSearchResults = document.getElementById("mobile-search-results");

if (mobileSearchInput && mobileSearchResults) {
  mobileSearchInput.addEventListener("input", async () => {
    const query = mobileSearchInput.value.trim();

    if (query.length < 2) {
      mobileSearchResults.innerHTML = "";
      return;
    }

    try {
      const response = await fetch(
        `/cinetech/?page=search&query=${encodeURIComponent(query)}`
      );
      if (!response.ok) throw new Error("Erreur de recherche");
      
      const results = await response.json();
      
      mobileSearchResults.innerHTML = results
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
      mobileSearchResults.innerHTML = "";
    }
  });

  document.addEventListener('click', (e) => {
    if (!mobileSearchInput.contains(e.target) && !mobileSearchResults.contains(e.target)) {
      mobileSearchResults.innerHTML = '';
    }
  });
}
