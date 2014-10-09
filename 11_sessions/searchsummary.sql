CREATE TABLE searchsummary
(
  searchterm    VARCHAR(255) NOT NULL,  -- search term
  source        VARCHAR(15) NOT NULL,   -- site where search was performed
  sdate         DATE NOT NULL,          -- date search performed
  searches      INT UNSIGNED NOT NULL,  -- number of searches
  PRIMARY KEY (searchterm, source, sdate)
);
