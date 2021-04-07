describe('Test Homepage', () => {
    it('Visits the home page', () => {
        cy.visit('http://localhost:8000/')
        cy.url().should('include', '/')
        cy.contains('Welcome').should('be.visible')
    })
})
