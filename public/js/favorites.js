document.addEventListener("DOMContentLoaded", () => {
  const favoriteButtons = document.querySelectorAll(".favorite-button");

  favoriteButtons.forEach((button) => {
    button.addEventListener("click", async () => {
      const isFavorited = button.dataset.favorited === "true";
      const elementId = button.dataset.elementId;
      const elementType = button.dataset.elementType;

      const action = isFavorited ? "remove-favori" : "add-favori";

      try {
        const response = await fetch(`?page=${action}`, {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: new URLSearchParams({
            element_id: elementId,
            element_type: elementType,
            title: button.dataset.title,
            poster_path: button.dataset.posterPath
          }),
        });

        if (response.ok) {
          // Basculement de l'état favori
          button.dataset.favorited = isFavorited ? "false" : "true";
          const icon = button.querySelector(".fa-star");
          icon.classList.toggle("filled");
          icon.classList.toggle("empty");
          icon.title = isFavorited
            ? "Ajouter aux favoris"
            : "Retirer des favoris";
        } else {
          console.error("Erreur lors de la mise à jour du favori.");
        }
      } catch (error) {
        console.error("Erreur réseau :", error);
      }
    });
  });
});
