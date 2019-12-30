describe('Todo App Test', function() {

    it ('Add new todo', function () {
        cy.visit('http://localhost')
        cy.get('#add-new-todo')
            .type('This is todo created by cypress :)', {delay: 100})
            .should('have.value', 'This is todo created by cypress :)')
            .type('{enter}')

        cy.wait(1000)
        cy.get('.info-box').contains('added')

        cy.wait(1000)
        cy.get('.list-group .list-group-item')
            .first()
            .contains('This is todo created by cypress :)')
    })

    it ('Edit todo', function() {
        cy.get('.list-group .list-group-item .edit')
            .first()
            .click()

        cy.url().should('include', '/edit-todo.php')
        cy.get('#edit-todo')
            .contains('This is todo created by cypress :)')
            .type(', also edited :)', {delay: 100})

        cy.get('.edit-todo').click()
        cy.wait(1000)
        cy.url().should('include', '/')
        cy.get('.info-box').contains('edited')
        cy.get('.list-group .list-group-item')
            .first()
            .contains('This is todo created by cypress :), also edited :)')
    })

    it ('Delete todo', function() {
        cy.get('.list-group .list-group-item .delete')
            .first()
            .click()

        cy.url().should('include', '/delete-todo.php')
        cy.get('#delete-todo')
            .contains('This is todo created by cypress :), also edited :)')

        cy.get('.delete-todo').click()

        const stub = cy.stub()

        stub.onFirstCall().returns(false)
        stub.onFirstCall().returns(true)

        cy.on('window:confirm', stub)
        cy.url().should('include', '/')
        cy.get('.info-box').contains('removed')
    })

})