const email = 'tester40@example.org'

describe('Registration and Login Tests', () => {
  it('Navigates to the registration page and registers', () => {
    // navigate to registration page
    cy.visit('http://localhost:8000/')
    cy.contains('register').click()
    cy.url().should('include', '/register')
    cy.contains('Register').should('be.visible')

    // fill in form data
    cy.get('#email')
      .type(email)
      .should('have.value', email)
    cy.get('#name')
      .type('John Doe')
      .should('have.value', 'John Doe')
    cy.get('#password')
      .type('password')
      .should('have.value', 'password')
    cy.get('#password-confirmation')
      .type('password')
      .should('have.value', 'password')

    // submit the form
    cy.get('form>button[type="submit"]')
      .click()

    cy.url().should('include', '/login')
  })
  it('Logs in the new user', () => {
    cy.get('#email')
      .type(email)
      .should('have.value', email)
    cy.get('#password')
      .type('password')
      .should('have.value', 'password')

    // submit the form
    cy.get('form>button[type="submit"]')
      .click()
  })
  it('Visits the dashboard', () => {
    cy.contains('home')
      .click()

    cy.url().should('include', '/dashboard')
    cy.contains('dashboard').should('be.visible')
  })
})
