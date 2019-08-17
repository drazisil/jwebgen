describe("Test controller nextAction", function() {
    it("ponyBreed", function() {
      cy.visit("localhost:8000/controller.php?&DadID=1&MomID=2&age=Baby&bspattern=BC&bssocks=OO&bshair=TT&bsface=KK&nextAction=ponyBreed", { timeout: 50000 });
      cy.contains("Father | Mother");
    });
  });