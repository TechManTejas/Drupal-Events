# Install DDEV if not installed
if ! command -v ddev &> /dev/null
then
    echo "DDEV not found. Installing..."
    curl -fsSL https://raw.githubusercontent.com/drud/ddev/master/scripts/install_ddev.sh | bash
fi

# Start DDEV environment
ddev start

# Import the database
if [ -f "database.sql" ]; then
    ddev import-db --src=database.sql
else
    echo "Database backup not found!"
    exit 1
fi

# Install composer dependencies
ddev composer install

# Run database updates and cache clear
ddev drush updatedb -y
ddev drush cache:rebuild

echo "Drupal project setup complete!"
