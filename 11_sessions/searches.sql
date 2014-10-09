CREATE TABLE searches
(
  searchterm    VARCHAR(255) NOT NULL,  -- search term determined from 
                                        -- HTTP_REFERER parsing
  dt            DATETIME NOT NULL,      -- request date
  source        VARCHAR(15) NOT NULL    -- site where search was performed
);
