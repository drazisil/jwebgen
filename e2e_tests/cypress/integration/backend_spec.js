describe("Test controller nextAction", function() {
    it("ponyBreed", function() {
      cy.visit("localhost:8000/controller.php?nextAction=ponyBreed", { timeout: 50000 });
      cy.contains("PonyIsland did not respond or pony was not found, please try again");
    });
  });