select p.barcode, p.name, o.q, s.id2 FROM product p
INNER JOIN operation o ON p.id = o.product_id
INNER JOIN sell s ON s.id = o.sell_id
INNER JOIN person pe ON s.person_id = pe.id