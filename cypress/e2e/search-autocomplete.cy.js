describe('Recherche avec autocomplétion', () => {
  it('Affiche des suggestions et ouvre la page détail', () => {
    cy.visit('http://localhost/cinetech/?page=home')

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
  })
})
