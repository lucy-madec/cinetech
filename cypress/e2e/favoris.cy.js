describe('Gestion des favoris', () => {
  beforeEach(() => {
    cy.visit('http://localhost/cinetech/?page=login')
    cy.get('#email').type('lucy.madec@gmail.com')
    cy.get('#password').type('azerty')
    cy.get('button[type="submit"]').click()
    cy.location('search').should('include', 'page=home')
  })

  it('Ajoute un favori, le retrouve après reload, puis le retire', () => {
    // Aller à la page de connexion
    cy.visit('http://localhost/cinetech/?page=register')

    // Connexion avec le compte qu’on vient de créer
    cy.get('#email').type(email)
    cy.get('#password').type(password)
    cy.get('button[type="submit"]').click()
    
    // Recherche du film "Inception"
    cy.get('#search-input').type('inception')
    cy.wait(500) // attends 500ms pour laisser le temps aux suggestions d’apparaître

    cy.get('.search-result-item', { timeout: 10000 })
      .should('have.length.at.least', 1)
      .then($items => {
        const texts = [...$items].map(li => li.innerText.trim())
        cy.log('Suggestions trouvées:', texts.join(', '))
        const exact = [...$items].find(li => li.innerText.trim().toLowerCase().startsWith('inception'))
        if (exact) {
          cy.wrap(exact).scrollIntoView().should('be.visible').click({ force: true })
        } else {
          throw new Error('Suggestion "Inception" non trouvée. Suggestions: ' + texts.join(', '))
        }
      })

    cy.url().should('match', /\?page=detail&type=(movie|series)&id=\d+/)
    cy.get('[data-testid="title"]').should('be.visible')
    cy.get('h2.neon-text').should('be.visible')

    // Mettre en favoris
    

    // Vérifier l'ajout du film


  })
})
