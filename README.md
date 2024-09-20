# Drupal 10 Project with DDEV

This is a Drupal 10 project scaffolded and managed using DDEV for local development. This guide provides all the steps to set up and run the project on your local environment.

## Requirements

Before getting started, make sure you have the following installed on your machine:

- **Docker**: [Download Docker Desktop](https://www.docker.com/products/docker-desktop)
- **DDEV**: [Installation guide](https://ddev.readthedocs.io/en/stable/#installation)

## Installation Steps

### 1. Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/GeorginaBerrezel/my-drupal-site.git
cd my-drupal-site

ddev config --project-type=drupal --php-version=8.3 --docroot=web

ddev start

ddev composer install

ddev drush site:install --account-name=admin --account-pass=admin -y

ddev launch

Username: admin
Password: admin

