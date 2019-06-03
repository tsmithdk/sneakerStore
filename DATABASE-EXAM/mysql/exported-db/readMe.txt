1. Create `sneakerStore` database
(set the collation as: utfmb4_general_ci)
2. Import the sneakerStore.sql
3. Add the stored-procedure below
(Mysql doesn't export stored-procedures while exporting the whole database
it must be inserted manually.)

/************* stored-procedure to add ***************/


DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getProductsFromOneBrand`(IN `sBrand` VARCHAR(50))
    NO SQL
SELECT sneakers.sneaker_id,sneakers.sneaker_name, sneakers.gender, sneakers.description,
                                    sneakers.price, brand_names.brand_name FROM sneakers
                                    INNER JOIN brand_names ON brand_name_fk = brand_name_id
                                    where brand_name= sBrand$$
DELIMITER ;
