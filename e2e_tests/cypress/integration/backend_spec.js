describe("Test controller nextAction", function() {
    it("ponyBreed", function() {
      cy.visit("localhost/controller?nextAction=ponyBreed");
      cy.contains("PonyIsland did not respond or pony was not found, please try again");
    });
  });