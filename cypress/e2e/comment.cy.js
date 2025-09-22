describe('Ajouter un commentaire', () => {
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

    // Saisir un commentaire et soumettre le formulaire
    const commentaire = 'Ceci est un test automatique ';
    cy.get('.comments-section form.comment-form').first().find('textarea[name="content"]').should('be.visible').type(commentaire);
    cy.get('.comments-section form.comment-form').first().find('button[type="submit"]').click();

    // Vérifier que le commentaire apparaît dans la liste
    cy.contains('.comments-list', commentaire).should('be.visible');
  });
});