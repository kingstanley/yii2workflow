 
# yii2workflow
=======
Yii2 Workflow App
ERD - Entity Relationship Diagram 
![workflow1](https://user-images.githubusercontent.com/32240704/136833257-363e7cbe-31e1-4bdd-b884-74cc80bbb027.PNG)

ERD for workflow based on department
![workflow 2](https://user-images.githubusercontent.com/32240704/136833259-c164ee31-c022-4631-8f5a-54d03e459441.PNG)

Steps to run:

1. Create a database in mysql DBMS named workflow.
2. Change DB connection details appropriately
3. . Run migration to create the necessary tables in a database called workflow in mysql database
4. On Home screen click on Workflow menu or Get started Button
5. Create Departments
6. Create users
7. Create Approval Levels
8. Create Approval Mappings 
9. Create Request
10. Login as an Approval person and approve or reject

Note:
1. Only approval person can approve a request
2. The first approval person in a department must be the first to approve.
3. If any approval person reject, request is rejected
4. Approval is sequential

Limitation: Due to time constraint some functions were not fully considered
1. UI was not given much attention
2. Proper Access control like authorization was not given much attention. However, most section will not work if you are not logged in except for creating  department, user and Approval Level
>>>>>>> 1082aa1a3ff83d522dde8e5ebfa7ead858065be7
