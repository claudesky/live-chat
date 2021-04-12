describe('Test guest links', () => {
    it('Checks the login link', () => {
        cy.visit('/')
        cy.contains('a', 'login').click()
        cy.url().should('include', '/login')

        // Can see login form
        cy.contains('label', 'Email').should('be.visible')
        cy.get('input[name="email"]').should('be.visible')
        cy.contains('label', 'Password').should('be.visible')
        cy.get('input[name="password"]').should('be.visible')
    })

    it('Checks the register link', () => {
        cy.visit('/')
        cy.contains('a', 'register').click()
        cy.url().should('include', '/register')

        // Can see register form
        cy.contains('label', 'Email').should('be.visible')
        cy.get('input[name="email"]').should('be.visible')
        cy.contains('label', 'Name').should('be.visible')
        cy.get('input[name="name"]').should('be.visible')
        cy.contains('label', 'Password').should('be.visible')
        cy.get('input[name="password"]').should('be.visible')
        cy.contains('label', 'Confirm Password').should('be.visible')
        cy.get('input[name="password_confirmation"]').should('be.visible')
    })

    it('Checks the home link', () => {
        cy.visit('/')
        cy.contains('a', 'home').click()
        cy.location('pathname').should('equal', '/')
    })

    it('Checks the reload link', () => {
        cy.visit('/')

        // set before_reload flag
        cy.window().then(w => w.before_reload = true)

        cy.window().should('have.property', 'before_reload')

        cy.contains('a', 'Live-Chat').click()
        cy.location('pathname').should('equal', '/')

        cy.window().should('not.have.property', 'before_reload')
    })
})
