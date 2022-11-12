
ALTER TABLE steel_recycle DROP CONSTRAINT steel_pk;
ALTER TABLE steel_recycle DROP CONSTRAINT steel_fk;

ALTER TABLE pcb_recycle DROP CONSTRAINT pcb_pk;
ALTER TABLE pcb_recycle DROP CONSTRAINT pcb_fk;

ALTER TABLE copper_wire_recycle DROP CONSTRAINT cop_pk;
ALTER TABLE copper_wire_recycle DROP CONSTRAINT cop_fk;

ALTER TABLE plastic_recycle DROP CONSTRAINT plastic_pk;
ALTER TABLE plastic_recycle DROP CONSTRAINT plastic_fk;

ALTER TABLE recycle DROP CONSTRAINT recycle_pk;
ALTER TABLE recycle DROP CONSTRAINT recycle_fk;

ALTER TABLE materials DROP CONSTRAINT materials_pk;

ALTER TABLE recycled_storage DROP CONSTRAINT rs_pk;
ALTER TABLE recycled_storage DROP CONSTRAINT rs_fk;

ALTER TABLE recycled_items DROP CONSTRAINT it_pk;



DROP TABLE steel_recycle;
DROP TABLE pcb_recycle;
DROP TABLE copper_wire_recycle;
DROP TABLE plastic_recycle;
DROP TABLE recycle;
DROP TABLE materials;


DROP TABLE recycled_storage;
DROP TABLE recycled_items;

CREATE TABLE materials
(
     material_code VARCHAR2(4) NOT NULL,
     material_name VARCHAR2(15) NOT NULL,
     CONSTRAINT ma_pk PRIMARY KEY(material_code)
);


CREATE TABLE recycle
(
    process_id    VARCHAR2(15)   NOT NULL,
    material_code VARCHAR2(4) NOT NULL,
    material_amount NUMBER(10,2) NOT NULL,
    process_date TIMESTAMP NOT NULL,
    CONSTRAINT recycle_pk PRIMARY KEY(process_id),
    CONSTRAINT recycle_fk FOREIGN KEY(material_code) REFERENCES materials(material_code) ON DELETE CASCADE
);

CREATE TABLE steel_recycle
(
    process_id VARCHAR2(15)   NOT NULL,
    steel NUMBER(10,2) NOT NULL,
    iron  NUMBER(10,2) NOT NULL,
    CONSTRAINT steel_pk PRIMARY KEY(process_id),
    CONSTRAINT steel_fk FOREIGN KEY(process_id) REFERENCES recycle(process_id) ON DELETE CASCADE
);

CREATE TABLE pcb_recycle
(
    process_id VARCHAR2(15)   NOT NULL,
    copper NUMBER(10,2) NOT NULL,
    tin NUMBER(10,2) NOT NULL,
    steel NUMBER(10,2) NOT NULL,
    gold NUMBER(10,2) NOT NULL,
    silver NUMBER(10,2) NOT NULL,
    CONSTRAINT pcb_pk PRIMARY KEY(process_id),
    CONSTRAINT pcb_fk FOREIGN KEY(process_id) REFERENCES recycle(process_id) ON DELETE CASCADE
);

CREATE TABLE copper_wire_recycle
(
    process_id VARCHAR2(15)   NOT NULL,
    copper NUMBER(10,2) NOT NULL,
    plastic NUMBER(10,2) NOT NULL,
    CONSTRAINT cop_pk PRIMARY KEY(process_id),
    CONSTRAINT cop_fk FOREIGN KEY(process_id) REFERENCES recycle(process_id) ON DELETE CASCADE
);

CREATE TABLE plastic_recycle
(
    process_id VARCHAR2(15)   NOT NULL,
    plastic NUMBER(10,2) NOT NULL,
    CONSTRAINT plastic_pk PRIMARY KEY(process_id),
    CONSTRAINT plastic_fk FOREIGN KEY(process_id) REFERENCES recycle(process_id) ON DELETE CASCADE
);



CREATE TABLE recycled_items
(
    item_code VARCHAR2(4) NOT NULL,
    item_name VARCHAR2(15) NOT NULL,
    CONSTRAINT it_pk PRIMARY KEY(item_code)
);

CREATE TABLE recycled_storage
(
    item_code VARCHAR2(4) NOT NULL,
    item_amount NUMBER(10,2) NOT NULL,
    CONSTRAINT rs_pk PRIMARY KEY(item_code),
    CONSTRAINT rs_fk FOREIGN KEY(item_code) REFERENCES recycled_items(item_code) ON DELETE CASCADE
);
​










