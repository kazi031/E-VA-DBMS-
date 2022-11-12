-- steel recycling

CREATE OR REPLACE TRIGGER after_steel_recycle_ins
AFTER INSERT ON steel_recycle
FOR EACH ROW
DECLARE
v_curr_steel_amount NUMBER(10,2); 
v_curr_iron_amount NUMBER(10,2);
BEGIN
--  steel
	SELECT rs.item_amount
		INTO v_curr_steel_amount FROM recycled_storage rs
	WHERE item_code = 'r001';
--  iron	
	SELECT rs.item_amount
		INTO v_curr_iron_amount FROM recycled_storage rs
	WHERE item_code = 'r002';
--  update steel
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_steel_amount + :new.steel
	WHERE rs.item_code = 'r001';
--  update iron
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_iron_amount + :new.iron
	WHERE rs.item_code = 'r002';	
END;



-- pcb recycling



CREATE OR REPLACE TRIGGER after_pcb_recycle_ins
AFTER INSERT ON pcb_recycle
FOR EACH ROW
DECLARE
v_curr_copper_amount NUMBER(10,2); 
v_curr_tin_amount NUMBER(10,2);
v_curr_steel_amount NUMBER(10,2);
v_curr_gold_amount NUMBER(10,2);
v_curr_silver_amount NUMBER(10,2);
BEGIN
--  copper
	SELECT rs.item_amount
		INTO v_curr_copper_amount FROM recycled_storage rs
	WHERE item_code = 'r003';
--  tin
	SELECT rs.item_amount
		INTO v_curr_tin_amount FROM recycled_storage rs
	WHERE item_code = 'r004';
--  steel
	SELECT rs.item_amount
		INTO v_curr_steel_amount FROM recycled_storage rs
	WHERE item_code = 'r001';
--  gold
    SELECT rs.item_amount
		INTO v_curr_gold_amount FROM recycled_storage rs
	WHERE item_code = 'r005';
--  silver
	SELECT rs.item_amount
		INTO v_curr_silver_amount FROM recycled_storage rs
	WHERE item_code = 'r006';

--  update copper
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_copper_amount + :new.copper
	WHERE rs.item_code = 'r003';
--  update tin
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_tin_amount + :new.tin
	WHERE rs.item_code = 'r004';
--  update steel
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_steel_amount + :new.steel
	WHERE rs.item_code = 'r001';
--  update gold
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_gold_amount + :new.gold
	WHERE rs.item_code = 'r005';
--  update silver
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_silver_amount + :new.silver
	WHERE rs.item_code = 'r006';
END;


-- copper_wire recycling

CREATE OR REPLACE TRIGGER after_copper_wire_recycle_ins
AFTER INSERT ON copper_wire_recycle
FOR EACH ROW
DECLARE
v_curr_copper_amount NUMBER(10,2); 
v_curr_plastic_amount NUMBER(10,2);
BEGIN
--  copper
	SELECT rs.item_amount
		INTO v_curr_copper_amount FROM recycled_storage rs
	WHERE item_code = 'r003';
--  plastic	
	SELECT rs.item_amount
		INTO v_curr_plastic_amount FROM recycled_storage rs
	WHERE item_code = 'r007';
--  update copper
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_copper_amount + :new.copper
	WHERE rs.item_code = 'r003';
--  update plastic
	UPDATE recycled_storage rs
		SET rs.item_amount = v_curr_plastic_amount + :new.plastic
	WHERE rs.item_code = 'r007';	
END;


-- plastic recycling


CREATE OR REPLACE TRIGGER after_plastic_recycle_ins
AFTER INSERT ON plastic_recycle
FOR EACH ROW
DECLARE
v_curr_plastic_amount NUMBER(10,2);
BEGIN
--  plastic    
    SELECT rs.item_amount
        INTO v_curr_plastic_amount FROM recycled_storage rs
    WHERE item_code = 'r007';

--  update plastic
    UPDATE recycled_storage rs
        SET rs.item_amount = v_curr_plastic_amount + :new.plastic
    WHERE rs.item_code = 'r007';    
END;​




