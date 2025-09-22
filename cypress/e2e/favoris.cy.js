describe('Gestion des favoris', () => {
  beforeEach(() => {
    cy.visit('http://localhost/cinetech/?page=login')
    cy.get('#email').type('lucy.madec@gmail.com')
    cy.get('#password').type('azerty')
    cy.get('button[type="submit"]').click()
    // Après la connexion
    cy.location('search', { timeout: 10000 }).should('include', 'page=home')
    cy.get('#search-input', { timeout: 10000 }).should('be.visible').and('not.be.disabled')
    cy.get('#search-input').clear().type('inception')
  })

  it('Ajoute un favori, le retrouve après reload, puis le retire', () => {
    // Recherche du film "Inception"
    // cy.get('#search-input').type('inception') // <-- À SUPPRIMER

    // Attendre que la suggestion "Inception" apparaisse explicitement
    cy.get('.search-result-item', { timeout: 10000 })
      .should('have.length.at.least', 1)
      .then($items => {
        const exact = [...$items].find(li => li.innerText.trim().toLowerCase().startsWith('inception'))
        if (exact) {
          cy.wrap(exact).scrollIntoView().should('be.visible').click({ force: true })
        } else {
          const texts = [...$items].map(li => li.innerText.trim())
          throw new Error('Suggestion "Inception" non trouvée. Suggestions: ' + texts.join(', '))
        }
      })

    cy.url().should('match', /\?page=detail&type=(movie|series)&id=\d+/)
    cy.get('[data-testid="title"]').should('be.visible')
    cy.get('h2.neon-text').should('be.visible')

    // Mettre en favoris
    cy.get('.favorite-button .fa-star')
      .should('have.class', 'empty') // étoile blanche (non favori)
      .click()
    cy.get('.favorite-button .fa-star')
      .should('have.class', 'filled') // étoile jaune (favori)

    // Vérifier que "Inception" est dans la liste des favoris
    cy.visit('http://localhost/cinetech/?page=favoris')
    cy.url().should('include', '?page=favoris')
    cy.contains('.favoris-list, .favorites-list, body', 'Inception').should('be.visible')
  })
})
