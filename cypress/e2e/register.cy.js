describe('Inscription → Login → Vérification du nom', () => {
  it('Un utilisateur peut s’inscrire puis se connecter', () => {
    const username = 'vanny'
    const password = 'mdp123456!'
    const email = `vanny@example.com`

    // Aller sur la page d'inscription
    cy.visit('http://localhost/cinetech/?page=register')

    // Remplir les champs du formulaire d'inscription
    cy.get('#username').type(username)
    cy.get('#email').type(email)
    cy.get('#password').type(password)

    // Cliquer sur le bouton "S'inscrire"
    cy.get('button[type="submit"]').click()

    // Vérifier la redirection vers la page de connexion
    cy.url().should('include', '?page=login')

    // Connexion avec le compte qu’on vient de créer
    cy.get('#email').type(email)
    cy.get('#password').type(password)
    cy.get('button[type="submit"]').click()

    // Vérifier que l'utilisateur est bien connecté
    cy.url().should('include', '?page=home')
    // Vérifie le nom d'utilisateur sous le logo
    cy.contains('body', username, { timeout: 10000 }).should('be.visible')
  })
})
