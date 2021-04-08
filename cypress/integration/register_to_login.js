const email = 'test@example.org'

describe('Registration and Login Tests', () => {
  before(() => {
    cy.refreshDatabase()
  })

  it('Navigates to the registration page and registers', () => {
    // navigate to registration page
    cy.visit('http://localhost:8000/')
    cy.contains('register').click()
    cy.url().should('include', '/register')
    cy.contains('Register').should('be.visible')
  })

  it('Fills in and submits the registration form', () => {
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
  })

  it('Gets redirected to login page', () => {
    cy.url().should('include', '/login')
    cy.contains('Login').should('be.visible')
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

  it('Get redirected to the dashboard', () => {
    cy.url().should('include', '/dashboard')
  })
})
