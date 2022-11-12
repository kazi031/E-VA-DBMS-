
-- materials data

INSERT INTO materials(material_code,material_name) VALUES ('m001','steel');
INSERT INTO materials(material_code,material_name) VALUES ('m002','pcb');
INSERT INTO materials(material_code,material_name) VALUES ('m003','copper wire');
INSERT INTO materials(material_code,material_name) VALUES ('m004','plastic');


-- recycled items data

INSERT INTO recycled_items(item_code,item_name) VALUES ('r001','steel');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r002','iron');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r003','copper');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r004','tin');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r005','gold');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r006','silver');
INSERT INTO recycled_items(item_code,item_name) VALUES ('r007','plastic');

-- recycled item storage init

INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r001',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r002',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r003',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r004',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r005',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r006',0.00);
INSERT INTO recycled_storage(item_code,item_amount) VALUES ('r007',0.00);


------------------------------------------------------------------------------------------

-- steel check
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('p000001',20.2,10.1)
INSERT INTO recycle(process_id,material_code,material_amount,process_date) VALUES('p000001','m001',50.00,(SELECT to_timestamp(SYSDATE,'DD-MM-YYYY HH:MI:SS AM') FROM dual))
SELECT to_timestamp(SYSDATE,'DD-MM-YYYY HH:MI:SS AM') FROM dual


-- pcb check
INSERT INTO recycle(process_id,material_code,material_amount,process_date) VALUES('p000002','m002',30.00,(SELECT to_timestamp(SYSDATE,'DD-MM-YYYY HH:MI:SS AM') FROM dual))
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('p000002',5.2,4.2,1.2,0.3,0.5)

-- copper wire check

INSERT INTO recycle(process_id,material_code,material_amount,process_date) VALUES('p000003','m003',42.2,(SELECT to_timestamp(SYSDATE,'MM-DD-YYYY HH:MI:SS AM') FROM dual))
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('p000003',10.25,12.3)

-- plastic check

INSERT INTO recycle(process_id,material_code,material_amount,process_date) VALUES('p000004','m004',50,(SELECT to_timestamp(SYSDATE,'MM-DD-YYYY HH:MI:SS AM') FROM dual))
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('p000003',30.2)



-------------------------------------------------------------------------------------------

--process at jan 5th
insert into recycle(process_id,material_code,material_amount,process_date) 
values('PL-7777758240','m004',100.3,TO_DATE('2021/01/05 05:02:44', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('PL-7777758240',70.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('CW-7557758240','m003',120.3,TO_DATE('2021/01/05 05:02:44', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('CW-7557758240',30.2,50.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PB-9957758240','m002',80.3,TO_DATE('2021/01/05 05:02:44', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('PB-9957758240',15.2,14.2,11.2,1.3,3.5);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('ST-9957758277','m001',50.3,TO_DATE('2021/01/05 05:02:44', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('ST-9957758277',20.2,10.1);

--process at jan 6th


insert into recycle(process_id,material_code,material_amount,process_date) 
values('PL-7777711140','m004',50.3,TO_DATE('2021/01/06 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('PL-7777711140',32.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('CW-7555558240','m003',87.3,TO_DATE('2021/01/06 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('CW-7555558240',20.2,35.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PB-9957757250','m002',40.3,TO_DATE('2021/01/06 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('PB-9957757250',5.2,4.2,1.2,.6,1.5);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('ST-9957864277','m001',100.3,TO_DATE('2021/01/06 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('ST-9957864277',40.2,20.1);


--process at jan 7th


insert into recycle(process_id,material_code,material_amount,process_date) 
values('PL-7720258240','m004',50.3,TO_DATE('2021/01/07 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('PL-7720258240',32.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('CW-7530158240','m003',87.3,TO_DATE('2021/01/07 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('CW-7530158240',20.2,35.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PB-9954448240','m002',40.3,TO_DATE('2021/01/07 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('PB-9954448240',5.2,4.2,1.2,.6,1.5);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('ST-9999958277','m001',100.3,TO_DATE('2021/01/07 05:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('ST-9999958277',40.2,20.1);


--process at jan 8th

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PL-7722038240','m004',55.3,TO_DATE('2021/01/08 04:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('PL-7722038240',33.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('CW-7530501240','m003',112.3,TO_DATE('2021/01/08 04:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('CW-7530501240',26.2,39.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PB-9953078240','m002',100.3,TO_DATE('2021/01/08 04:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('PB-9953078240',19.2,15.2,10.2,2.6,6.5);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('ST-9999803277','m001',50.3,TO_DATE('2021/01/08 04:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('ST-9999803277',10.2,15.1);


--process at jan 9th

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PL-7788888240','m004',75.3,TO_DATE('2021/01/09 02:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO plastic_recycle(process_id,plastic) VALUES ('PL-7788888240',42.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('CW-7532521240','m003',87.3,TO_DATE('2021/01/09 02:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO copper_wire_recycle(process_id,copper,plastic) VALUES ('CW-7532521240',21.2,33.2);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('PB-9953345240','m002',101.3,TO_DATE('2021/01/09 02:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO pcb_recycle(process_id,copper,tin,steel,gold,silver) VALUES ('PB-9953345240',20.2,15.21,11.2,2.8,6.9);

insert into recycle(process_id,material_code,material_amount,process_date) 
values('ST-9123803277','m001',60.3,TO_DATE('2021/01/09 02:02:42', 'yyyy/mm/dd hh24:mi:ss'));
INSERT INTO steel_recycle(process_id,steel,iron) VALUES ('ST-9123803277',15.2,17.1);
