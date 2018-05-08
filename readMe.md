CSCI 332 Final Project
By: Andrew Miller

Site to access project:   http://andrewm.sgedu.site/

Reworked project adding connector tables and removed redundancy since presentation, 4th Normal Form.

Function:
  FindTotalPrice() accepts profit margin and cost and calculates total

Procedure:
  CountCustomers() accepts storeID and counts how many customers that location has

Trigger:
  nonNegativeCost disallows administrative user to add an item whos price is below 0

Integrety enforcement through the use of Primary/Foreign Keys as well as cascading deletes

Isolation level:
  Read Committed, this is an application designed for single user administrative situations

