CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `view_order` AS
    SELECT 
        `order`.`order_id` AS `order_id`,
        `order`.`customer_id` AS `customer_id`,
        `order`.`customer_name` AS `customer_name`,
        `order`.`customer_company` AS `customer_company`,
        `order`.`customer_street_address` AS `customer_street_address`,
        `order`.`customer_suburb` AS `customer_suburb`,
        `order`.`customer_city` AS `customer_city`,
        `order`.`customer_postcode` AS `customer_postcode`,
        `order`.`customer_state` AS `customer_state`,
        `order`.`customer_country` AS `customer_country`,
        `order`.`customer_telephone` AS `customer_telephone`,
        `order`.`email` AS `email`,
        `order`.`delivery_name` AS `delivery_name`,
        `order`.`delivery_company` AS `delivery_company`,
        `order`.`delivery_street_address` AS `delivery_street_address`,
        `order`.`delivery_suburb` AS `delivery_suburb`,
        `order`.`delivery_city` AS `delivery_city`,
        `order`.`delivery_postcode` AS `delivery_postcode`,
        `order`.`delivery_state` AS `delivery_state`,
        `order`.`delivery_country` AS `delivery_country`,
        `order`.`billing_name` AS `billing_name`,
        `order`.`billing_company` AS `billing_company`,
        `order`.`billing_street_address` AS `billing_street_address`,
        `order`.`billing_suburb` AS `billing_suburb`,
        `order`.`billing_city` AS `billing_city`,
        `order`.`billing_postcode` AS `billing_postcode`,
        `order`.`billing_state` AS `billing_state`,
        `order`.`billing_country` AS `billing_country`,
        `order`.`payment_method` AS `payment_method`,
        `order`.`date_purchased` AS `date_purchased`,
        `order`.`orders_date_finished` AS `orders_date_finished`,
        `order`.`order_price` AS `order_price`,
        `order`.`shipping_cost` AS `shipping_cost`,
        `order`.`shipping_method` AS `shipping_method`,
        `order`.`shipping_duration` AS `shipping_duration`,
        `order`.`order_information` AS `order_information`,
        `order`.`is_seen` AS `is_seen`,
        `order`.`coupon_code` AS `coupon_code`,
        `order`.`coupon_amount` AS `coupon_amount`,
        `order`.`free_shipping` AS `free_shipping`,
        `order`.`customer_remark` AS `customer_remark`,
        `order`.`create_date` AS `create_date`,
        `order`.`create_by_id` AS `create_by_id`,
        `order`.`edit_date` AS `edit_date`,
        `order`.`edit_by_id` AS `edit_by_id`,
        `order`.`status` AS `status`
    FROM
        `order`