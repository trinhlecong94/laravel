    use laravel;
    INSERT INTO `products` (`id`, `brand`, `code`, `date`,`name`,`description`, `price`,  `status`, `category_id`, `color_id`) VALUES 
    (1,'Roadster','2475784','2019-01-01','Navy Blue printed T-shirt, has a polo collar, short sleeves','Men Navy Blue Printed Polo Collar T-shirt',56,0,2,1),
    (2,'Moda Rapido','2378362','2019-01-02','Maroon and black printed T-shirt, has a round neck, long sleeves','Men Maroon Printed Round Neck T-shirt',45,0,2,11),
    (3,'MANGO','8675777','2019-01-03','Red and white printed T-shirt with embroidered, has a round neck, short sleeves','Women Red Printed Round Neck T-shirt',39,0,1,11),
    (4,'Tommy Hilfiger','8588765','2019-01-04','Pink solid T-shirt, has a V-neck, short sleeves','Women Pink Solid V-Neck T-shirt',47,0,1,10),
    (5,'Pepe Jeans','8378533','2019-01-05','Green printed T-shirt, has a round neck, short sleeves','Boys Green Printed Round Neck T-shirt',35,0,3,6),
    (6,'HERE&NOW','4318138','2019-01-06','Black and orange printed T-shirt, has a round neck, short sleeves','Men Black Printed Round Neck T-shirt',45,0,2,1),
    (7,'FIDO DIDO','2471500','2019-01-07','Pink solid T-shirt, has a polo collar, short sleeves.','Men Pink Solid Polo Collar Slim Fit T-shirt',48,0,2,10),
    (8,'Roadster','3314131','2019-01-08','Black solid T-shirt, has a round neck, short sleeves','Men Black Solid Round Neck T-shirt',54,0,2,1),
    (9,'Tommy Hilfiger','8588669','2019-01-09','Green solid T-shirt, has a round neck, short sleeves','Women Green Solid Round Neck T-shirt',35,0,1,6),
    (10,'Roadster','2312468','2019-01-10','Maroon solid T-shirt, has a round neck, short sleeves','Women Maroon Solid Round Neck T-shirt',47,0,1,11),
    (11,'Calvin Klein Jeans','8754499','2019-01-11','Pink printed T-shirt, has a round neck, short sleeves','Women Pink Printed Round Neck T-shirt',33,0,1,10),
    (12,'Roadster','2275365','2019-01-12','White solid T-shirt, has a round neck, short sleeves','Men White Solid Round Neck T-shirt',45,0,2,12),
    (13,'Polo Ralph Lauren','9062699','2019-01-13','Green solid T-shirt, has a polo collar, short sleeves','Men Green Solid Polo Collar T-shirt',56,0,2,6),
    (14,'Calvin Klein Jeans','8509609','2019-01-14','Blue solid T-shirt, has a polo collar, short sleeves','Men Blue Solid Polo Collar T-shirt',53,0,2,2),
    (15,'Harpa','7578951','2019-01-15','Dusty pink solid T-shirt, has a round neck, three-quarter sleeves with striped detail','Women Dusty Pink Solid Round Neck T-shirt',35,0,1,10),
    (16,'Roadster','2355195','2019-01-16','White solid T-shirt, has a round neck, short sleeves','Women White Solid Round Neck T-shirt',44,0,1,12),
    (17,'FOREVER 21','8822195','2019-01-17','Red printed T-shirt, has a round neck, short sleeves','Women Red Printed Round Neck T-shirt',38,1,1,11);

    INSERT INTO `laravel`.`images` (`id`, `delete_flag`, `name`, `url`,`product_id`) VALUES 
    (6,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2378362/2018/6/9/270e0a7e-365b-4640-9433-b269c60bf3061528527188563-Moda-Rapido-Men-Maroon-Printed-Round-Neck-T-shirt-3811528527-1.jpg',2),
    (7,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2378362/2018/6/9/405568f1-c3c1-4713-9c38-6dd95ac962d31528527188543-Moda-Rapido-Men-Maroon-Printed-Round-Neck-T-shirt-3811528527-2.jpg',2),
    (8,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2378362/2018/6/9/33523035-65f5-4fcb-b7a5-4062e656d10b1528527188511-Moda-Rapido-Men-Maroon-Printed-Round-Neck-T-shirt-3811528527-3.jpg',2),
    (9,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2378362/2018/6/9/ed7b0cd1-8fa7-4f65-95b4-36518bfa94461528527188485-Moda-Rapido-Men-Maroon-Printed-Round-Neck-T-shirt-3811528527-4.jpg',2),
    (10,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8675777/2019/2/8/c8cbb91b-8a3c-4a6b-8db1-a7c3aa548d4c1549627570947-MANGO-Women-Tshirts-6761549627569578-1.jpg',3),
    (11,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8675777/2019/2/8/c59d1629-4456-4547-a6a4-e60d531a90eb1549627570924-MANGO-Women-Tshirts-6761549627569578-2.jpg',3),
    (12,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8675777/2019/2/8/544c44da-093c-496a-a92d-261edb1ee2461549627570904-MANGO-Women-Tshirts-6761549627569578-3.jpg',3),
    (13,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8675777/2019/2/8/6169a94b-3c1e-4abc-bd9c-d5fffeea39251549627570887-MANGO-Women-Tshirts-6761549627569578-4.jpg',3),
    (14,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8588765/2019/2/16/996a4fd9-7830-4f27-9a8e-8e77665f8a6d1550302405311-Tommy-Hilfiger-Women-Pink-Solid-V-Neck-T-shirt-4561550302403-1.jpg',4),
    (15,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8588765/2019/2/16/671ec568-0536-4365-86e7-f7c558cd521f1550302405294-Tommy-Hilfiger-Women-Pink-Solid-V-Neck-T-shirt-4561550302403-2.jpg',4),
    (16,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8588765/2019/2/16/a1b1a6d1-0c35-4838-96dc-9e42ecfbb7d91550302405276-Tommy-Hilfiger-Women-Pink-Solid-V-Neck-T-shirt-4561550302403-3.jpg',4),
    (17,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8588765/2019/2/16/d8380e8c-0e8d-4bd8-87a2-b33d4454f1151550302405256-Tommy-Hilfiger-Women-Pink-Solid-V-Neck-T-shirt-4561550302403-4.jpg',4),
    (18,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8588765/2019/2/16/3b49edc6-f83d-46d0-b126-efc2fbbfd0e61550302405244-Tommy-Hilfiger-Women-Pink-Solid-V-Neck-T-shirt-4561550302403-5.jpg',4),
    (40,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8378519/2019/1/23/6bfe3d23-84d0-4f6f-85df-f946cc0ab8f51548246009011-Pepe-Jeans-Boys-Tshirts-6941548246008189-1.jpg',5),
    (41,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8378519/2019/1/23/0f9bcef9-4b64-4310-9b8b-e46d1c0a963c1548246008985-Pepe-Jeans-Boys-Tshirts-6941548246008189-2.jpg',5),
    (42,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/8378519/2019/1/23/3c13c0f7-76ee-4e7d-ba97-462ecdfe02421548246008951-Pepe-Jeans-Boys-Tshirts-6941548246008189-3.jpg',5),
    (43,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/4318138/2018/5/4/11525433792765-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-1.jpg',6),
    (44,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/4318138/2018/5/4/11525433792736-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-2.jpg',6),
    (45,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/4318138/2018/5/4/11525433792709-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-3.jpg',6),
    (46,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/4318138/2018/5/4/11525433792691-HERENOW-Men-Black-Printed-Round-Neck-T-shirt-2881525433792598-4.jpg',6),
    (47,0,"name",'https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/2471500/2018/2/9/11518159758071-FIDO-DIDO-Men-Tshirts-9591518159757862-1.jpg',7),
    (48,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2471500/2018/2/9/11518159758046-FIDO-DIDO-Men-Tshirts-9591518159757862-2.jpg',7),
    (49,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2471500/2018/2/9/11518159758019-FIDO-DIDO-Men-Tshirts-9591518159757862-3.jpg',7),
    (50,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2471500/2018/2/9/11518159757994-FIDO-DIDO-Men-Tshirts-9591518159757862-4.jpg',7),
    (51,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2471500/2018/2/9/11518159757971-FIDO-DIDO-Men-Tshirts-9591518159757862-5.jpg',7),
    (52,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/3314131/2018/5/23/043198c4-a8ea-4b81-a688-3562937b790b1527055422713-Roadster-Men-Black-Solid-Round-Neck-T-shirt-4351527055421300-1.jpg',8),
    (53,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/3314131/2018/5/23/f44a8cb7-c798-4f8f-80e7-98a0cc747d641527055422694-Roadster-Men-Black-Solid-Round-Neck-T-shirt-4351527055421300-2.jpg',8),
    (54,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/3314131/2018/5/23/b4921821-e9d7-4844-a01e-97b075c381561527055422644-Roadster-Men-Black-Solid-Round-Neck-T-shirt-4351527055421300-4.jpg',8),
    (55,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/3314131/2018/5/23/f4e49847-d4d9-43f2-8fed-a7d67a6c878e1527055422624-Roadster-Men-Black-Solid-Round-Neck-T-shirt-4351527055421300-5.jpg',8),
    (56,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8588669/2019/3/14/61074788-ea2f-430d-abb5-bb650fc09ef71552538394125-Tommy-Hilfiger-Women-Green-Solid-Round-Neck-T-shirt-65015525-1.jpg',9),
    (57,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8588669/2019/3/14/d6a7cfab-fcfe-4a02-a648-4c7d57248bb91552538394103-Tommy-Hilfiger-Women-Green-Solid-Round-Neck-T-shirt-65015525-2.jpg',9),
    (58,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8588669/2019/3/14/a376a237-7511-4c87-ae45-cfef789fee521552538394081-Tommy-Hilfiger-Women-Green-Solid-Round-Neck-T-shirt-65015525-3.jpg',9),
    (59,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8588669/2019/3/14/eb416de3-4969-4da1-81f3-245b4cc1addf1552538394063-Tommy-Hilfiger-Women-Green-Solid-Round-Neck-T-shirt-65015525-4.jpg',9),
    (60,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8588669/2019/3/14/26995bbf-722e-4caf-96f0-9b78e220ac111552538394051-Tommy-Hilfiger-Women-Green-Solid-Round-Neck-T-shirt-65015525-5.jpg',9),
    (61,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2312468/2018/2/21/11519195992929-Roadster-Women-Maroon-Solid-Round-Neck-T-shirt-7951519195992737-1.jpg',10),
    (62,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2312468/2018/2/21/11519195992900-Roadster-Women-Maroon-Solid-Round-Neck-T-shirt-7951519195992737-2.jpg',10),
    (63,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2312468/2018/2/21/11519195992877-Roadster-Women-Maroon-Solid-Round-Neck-T-shirt-7951519195992737-3.jpg',10),
    (64,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2312468/2018/2/21/11519195992846-Roadster-Women-Maroon-Solid-Round-Neck-T-shirt-7951519195992737-4.jpg',10),
    (65,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2312468/2018/2/21/11519195992813-Roadster-Women-Maroon-Solid-Round-Neck-T-shirt-7951519195992737-5.jpg',10),
    (66,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8754499/2019/3/7/f3d12560-5c45-4f92-bfca-27de06f965cf1551942281489-Calvin-Klein-Jeans-Women-Pink-Printed-Round-Neck-T-shirt-528-1.jpg',11),
    (67,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8754499/2019/3/7/27ac6ca5-7b5f-4e67-94f5-2164c6a367611551942281468-Calvin-Klein-Jeans-Women-Pink-Printed-Round-Neck-T-shirt-528-2.jpg',11),
    (68,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8754499/2019/3/7/d8a9af51-4544-4556-a342-4a2ec3615c3b1551942281454-Calvin-Klein-Jeans-Women-Pink-Printed-Round-Neck-T-shirt-528-3.jpg',11),
    (69,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8754499/2019/3/7/650eff2e-34c6-40ca-bc06-66e572254f291551942281436-Calvin-Klein-Jeans-Women-Pink-Printed-Round-Neck-T-shirt-528-4.jpg',11),
    (70,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8754499/2019/3/7/08c6d66b-7bf9-469c-a4d5-f671977191741551942281425-Calvin-Klein-Jeans-Women-Pink-Printed-Round-Neck-T-shirt-528-5.jpg',11),
    (71,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2275365/2018/2/2/11517569167995-Roadster-Men-White-Solid-Round-Neck-T-shirt-3961517569167870-1.jpg',12),
    (72,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2275365/2018/2/2/11517569167974-Roadster-Men-White-Solid-Round-Neck-T-shirt-3961517569167870-2.jpg',12),
    (73,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2275365/2018/2/2/11517569167954-Roadster-Men-White-Solid-Round-Neck-T-shirt-3961517569167870-3.jpg',12),
    (74,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2275365/2018/2/2/11517569167935-Roadster-Men-White-Solid-Round-Neck-T-shirt-3961517569167870-4.jpg',12),
    (75,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2275365/2018/2/2/11517569167919-Roadster-Men-White-Solid-Round-Neck-T-shirt-3961517569167870-5.jpg',12),
    (76,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/9062699/2019/3/25/b4754bac-d92d-4585-a995-fda4b40db7df1553501240998-Polo-Ralph-Lauren-Men-Tshirts-9961553501239387-1.jpg',13),
    (77,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/9062699/2019/3/25/0c73897f-2b92-4c01-b035-052053b851cf1553501240973-Polo-Ralph-Lauren-Men-Tshirts-9961553501239387-2.jpg',13),
    (78,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/9062699/2019/3/25/9d1806fd-8cdd-4c50-9e92-025a090d021e1553501240945-Polo-Ralph-Lauren-Men-Tshirts-9961553501239387-3.jpg',13),
    (79,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/9062699/2019/3/25/576aa667-1120-4cd3-b8ba-e8d85351e9061553501240919-Polo-Ralph-Lauren-Men-Tshirts-9961553501239387-4.jpg',13),
    (80,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/9062699/2019/3/25/73a3f80c-3a25-49fb-84c8-5f5adff70ba31553501240901-Polo-Ralph-Lauren-Men-Tshirts-9961553501239387-5.jpg',13),
    (81,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8509609/2019/2/1/1c5170e4-ce53-4f88-8621-4a3514f0525d1549013042194-Calvin-Klein-Jeans-Men-Blue-Solid-Polo-Collar-T-shirt-538154-1.jpg',14),
    (82,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8509609/2019/2/1/b6fe893f-d895-47b6-a9d2-a37683fc9e801549013042177-Calvin-Klein-Jeans-Men-Blue-Solid-Polo-Collar-T-shirt-538154-2.jpg',14),
    (83,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8509609/2019/2/1/f7a5e6cb-47f5-42aa-80eb-9eb8e3becf6c1549013042158-Calvin-Klein-Jeans-Men-Blue-Solid-Polo-Collar-T-shirt-538154-3.jpg',14),
    (84,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8509609/2019/2/1/af1f974f-8660-4168-8b3d-9859179c12dc1549013042131-Calvin-Klein-Jeans-Men-Blue-Solid-Polo-Collar-T-shirt-538154-5.jpg',14),
    (85,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578951/2018/10/24/b2197469-6bab-4242-8928-a6fd092d04721540383597284-Harpa-Women-Tops-2001540383597148-1.jpg',15),
    (86,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578951/2018/10/24/314695d9-2b96-445e-806d-397c6a54c3271540383597271-Harpa-Women-Tops-2001540383597148-2.jpg',15),
    (87,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578951/2018/10/24/81403cab-76e1-474f-abca-47375a4efd691540383597245-Harpa-Women-Tops-2001540383597148-3.jpg',15),
    (88,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578951/2018/10/24/ef7fe1ec-8875-4320-a018-6ce36bf114441540383597233-Harpa-Women-Tops-2001540383597148-4.jpg',15),
    (89,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578951/2018/10/24/99f3488e-7ece-4ec2-817a-94f5a0e3e1941540383597299-Harpa-Women-Tops-2001540383597148-5.jpg',15),
    (90,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2355195/2019/3/14/b4a2b438-8183-4a60-8f43-b33b6fc98bff1552563548653-Roadster-Women-White-Solid-Round-Neck-T-shirt-32115525635468-1.jpg',16),
    (91,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2355195/2019/3/14/67d19790-a08d-408c-bfc0-18e06b14519e1552563548624-Roadster-Women-White-Solid-Round-Neck-T-shirt-32115525635468-2.jpg',16),
    (92,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2355195/2019/3/14/ca9734a0-079d-4bd6-b47b-479837247a2b1552563548600-Roadster-Women-White-Solid-Round-Neck-T-shirt-32115525635468-3.jpg',16),
    (93,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2355195/2019/3/14/0408bf47-690a-495b-92ea-f6d2a71d57191552563548583-Roadster-Women-White-Solid-Round-Neck-T-shirt-32115525635468-4.jpg',16),
    (94,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/2355195/2019/3/14/04c87ae2-65ef-4a07-a59d-10c182a4c1391552563548558-Roadster-Women-White-Solid-Round-Neck-T-shirt-32115525635468-5.jpg',16),
    (104,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8822195/2019/3/19/752f5432-d321-498c-bc7f-5a7d49ee80ab1552998180282-FOREVER-21-Women-Tshirts-3291552998179684-5.jpg',17),
    (103,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8822195/2019/3/19/d60705ee-c850-464f-8e39-66d7a59e3c061552998180298-FOREVER-21-Women-Tshirts-3291552998179684-4.jpg',17),
    (102,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8822195/2019/3/19/608d584f-52f2-49e5-86a7-9166ff264f321552998180316-FOREVER-21-Women-Tshirts-3291552998179684-3.jpg',17),
    (101,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8822195/2019/3/19/b60f639e-cd45-4e5b-849d-08e05159ea3f1552998180332-FOREVER-21-Women-Tshirts-3291552998179684-2.jpg',17),
    (100,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/8822195/2019/3/19/af34381c-eca8-450c-b462-7e04a1569a261552998180350-FOREVER-21-Women-Tshirts-3291552998179684-1.jpg',17),
    (105,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/3/22/2820a42c-8d1f-4621-8272-d131fa8faced1553258832098-1.jpg',1),
    (107,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/3/22/efe39b53-a4a9-4a30-ba90-838886b004861553258832135-2.jpg',1),
    (108,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/3/22/8276a3b2-08d8-40ac-8913-9995fb000a391553258832169-3.jpg',1),
    (109,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/3/22/e0cbf320-9bd4-40c1-bf0c-76054a95b9741553258832198-4.jpg',1),
    (110,0,"name",'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/3/22/7b2beca2-a6be-40f5-ad0a-18f3580e87531553258832225-5.jpg',1);

    INSERT INTO `laravel`.`comments` (`id`,`date`, `content`, `product_id`, `account_id`)  VALUES
    (1,'2019-03-23','nice shirt, i really like it',1,1),
    (2,'2019-03-23','wow! perfect',3,1),
    (3,'2019-03-23','I like it',1,2),
    (4,'2019-04-05','so hot',1,1),
    (5,'2019-04-09','Nice',1,2),
    (6,'2019-04-09','Nice product',10,1),
    (7,'2019-04-17','This shirt is too beautiful',1,10);

    INSERT INTO `laravel`.`sizes` (`id`, `name`) VALUES  
    (1,'XS'),(2,'S'),(3,'M'),(4,'L'),(5,'XL'),(6,'XXL');

    INSERT INTO `laravel`.`product_size` (`product_id`, `size_id`) VALUES
    (1,5),(1,4),(1,3),(1,2),(2,5),(2,4),(2,3),(2,2),(3,2),(3,3),(3,4),
    (4,2),(4,3),(4,4),(5,2),(5,1),(6,2),(6,3),(6,4),(6,5),(7,2),(7,3),
    (7,4),(7,5),(8,3),(8,4),(8,5),(9,1),(9,2),(9,3),(9,4),(10,1),(10,2),
    (10,3),(10,4),(10,5),(11,1),(11,2),(11,3),(11,4),(12,2),(12,3),(12,4),
    (13,2),(13,3),(13,4),(13,5),(14,3),(14,4),(14,5),(15,1),(15,2),(15,3),
    (15,4),(16,1),(16,2),(16,3),(16,4),(17,3),(17,2),(17,1),(2,6);

    INSERT INTO `laravel`.`promotions` 
    (`id`, `description`, `discount`, `start_date`, `name`,`end_date`, `status`) VALUES 
    (1,'Sale Off 20% for Women clothes',20,'2019-05-07','SALEOFF20','2019-03-28',0),
    (2,'Sale Off 10% for Men clothes',10,'2019-04-30','SALE4MEN10','2019-04-10',0),
    (3,'Sale Off 15% for Kids clothes',15,'2019-04-30','SALE4KID15','2019-04-11',0),
    (4,'Sale Off 10% for Men clothes',10,'2019-04-30','SALE4MEN10','2019-04-10',0),
    (5,'Sale Off 15% for Kids clothes',15,'2019-04-30','SALE4KID15','2019-04-11',0),
    (6,'Sale Off 20% for Women clothes',20,'2019-05-07','SALEOFF20','2019-03-28',0);

    INSERT INTO `laravel`.`product_promotion` ( `product_id`, `promotion_id`) VALUES 
    (1,5),(1,4),(1,3),(1,2),(2,5),(2,4),(2,3),(2,2),(3,2),(3,3),(3,4),(4,2),(4,3),(4,4),(5,2),
    (5,1),(6,2),(6,3),(6,4),(6,5),(7,2),(7,3),(7,4),(7,5),(8,3),(8,4),(8,5),(9,1),(9,2),(9,3),
    (9,4),(10,1),(10,2),(10,3),(10,4),(10,5),(11,1),(11,2),(11,3),(11,4),(12,2),(12,3),(12,4),
    (13,2),(13,3),(13,4),(13,5),(14,3),(14,4),(14,5),(15,1),(15,2),(15,3),(15,4),(16,1),(16,2),
    (16,3),(16,4),(17,3),(17,2),(17,1),(2,6);

    INSERT INTO `laravel`.`favorites` (`id`, `product_id`, `account_id`) VALUES 
    (9,1,3),(16,1,1),(17,1,5),(18,3,5),(19,1,10),(20,1,10),(21,1,2),(22,10,1);

    INSERT INTO `laravel`.`shippings` (`id`, `address`, `email`, `full_name`, `phone`) VALUES 
    (1,'Hoa Tien','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555666'),
    (2,'Hoa Tien','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555666'),
    (3,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (4,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (5,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (6,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (7,'La Bong, Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (8,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (9,'4609 Lincoln Park Drive','nguyendinhtai92dn@gmail.com','USER MOT','7034934583'),
    (10,'4609 Lincoln Park Drive','nguyendinhtai92dn@gmail.com','USER MOT','7034934583'),
    (11,'4609 Lincoln Park Drive','nguyendinhtai92dn@gmail.com','USER MOT','7034934583'),
    (12,'HOA THO','dinhtai92dn@gmail.com','NHU Y','9090999999'),
    (13,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (14,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (15,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (16,'Hoa Tien, Hoa Vang','dinhtai92dn@gmail.com','Nguyen Dinh Tai','0704555444'),
    (17,'Hoa Tien, Hoa Vang','dinhtai92.dn@gmail.com','TAI NGUYEN','012345611'),
    (18,'Hoa Tien, Hoa Vang','dinhtai92.dn@gmail.com','TAI NGUYEN','012345611');


    INSERT INTO `laravel`.`orders` (`id`, `date`, `status`, `prices`, `account_id`, `shipping_id`)  VALUES 
    (1,'2019-03-28','2',143.2,1,6),
    (2,'2019-03-28','0',141,1,7),
    (3,'2019-03-28','5',112,1,8),
    (4,'2019-03-29','0',56,1,9),
    (5,'2019-04-01','0',108,7,10),
    (6,'2019-04-01','0',93,7,11),
    (7,'2019-04-03','0',45,1,12),
    (8,'2019-04-03','2',47,1,13),
    (9,'2019-04-03','0',72.6,1,14),
    (10,'2019-04-05','0',33,1,15),
    (11,'2019-04-09','5',82.6,1,16),
    (12,'2019-04-09','0',199.2,1,17),
    (13,'2019-04-10','5',45,1,18);

    INSERT INTO `laravel`.`order_details` (`id`, `quantity`, `product_id`, `order_id`, `promotion_id`, `size_id`) VALUES
    (1,2,1,1,NULL,4),(2,1,1,3,1,3),(3,3,2,4,NULL,4),(4,1,3,1,NULL,5),
    (5,1,3,1,NULL,2),(6,1,4,1,NULL,5),(7,2,5,8,NULL,4),(8,1,6,3,NULL,2),
    (9,1,6,8,NULL,4),(10,1,7,2,NULL,2),(11,1,8,4,NULL,4),(12,1,9,5,NULL,1),
    (13,1,9,4,1,3),(14,1,10,11,NULL,3),(15,1,11,2,NULL,4),(16,1,11,4,1,3),
    (17,3,12,1,NULL,4),(18,1,12,3,1,4),(19,1,13,6,NULL,5);