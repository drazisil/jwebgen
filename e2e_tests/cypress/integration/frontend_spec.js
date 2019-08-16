describe("Test home", function() {
  it("Contains footer", function() {
    cy.visit("localhost");
    cy.contains("Website and coding © JWebNet");
  });
});

describe("Test lookup", function() {
    it("Contains footer", function() {
      cy.visit("localhost/lookup");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test generate", function() {
    it("Contains footer", function() {
      cy.visit("localhost/generate");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test starter", function() {
    it("Contains footer", function() {
      cy.visit("localhost/starter");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test starter oo", function() {
    it("Contains footer", function() {
      cy.visit("localhost/starterOO");
      cy.contains("Website and coding © JWebNet");
    });
  });
  
  describe("Test breed", function() {
    it("Contains footer", function() {
      cy.visit("localhost/breed");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test breed OO", function() {
    it("Contains footer", function() {
      cy.visit("localhost/breedOO");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test love", function() {
    it("Contains footer", function() {
      cy.visit("localhost/love");
      cy.contains("Website and coding © JWebNet");
    });
  });

  describe("Test changelog", function() {
    it("Contains footer", function() {
      cy.visit("localhost/changelog");
      cy.contains("Website and coding © JWebNet");
    });
  });
  