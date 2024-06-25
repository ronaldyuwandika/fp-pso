provider "google" {
  project = "fp-sisop"
  region  = "asia-southeast2"
}

resource "google_sql_database_instance" "instance" {
  name             = "mysql-instance"
  database_version = "MYSQL_5_7"
  region           = "asia-southeast2"

  settings {
    tier = "db-f1-micro"

    backup_configuration {
      enabled = true
    }

    ip_configuration {
      ipv4_enabled = true
      authorized_networks {
        name  = "allow-all"
        value = "0.0.0.0/0"
      }
    }
  }
}

resource "google_sql_database" "database" {
  name     = "itsparking"
  instance = google_sql_database_instance.instance.name
}

resource "google_sql_user" "user" {
  name     = "itsparking_user"
  instance = google_sql_database_instance.instance.name
  password = var.USER_PASSWORD
}

resource "google_cloud_run_service" "service" {
  name     = "itsparking"
  location = "asia-southeast2"

  template {
    spec {
      containers {
        image = "asia-southeast2-docker.pkg.dev/fp-sisop/itsparking/itsparking:latest"

        env {
            name = "APP_URL"
            value = "https://itsparking-6azj6n3oaq-et.a.run.app"
        }
        env {
            name ="APP_DEBUG"
            value = "false"
        }
        env {
            name  = "DB_CONNECTION"
            value = "mysql"
        }
        env {
          name  = "DB_HOST"
          value = google_sql_database_instance.instance.public_ip_address
        }
        env {
          name  = "DB_DATABASE"
          value = google_sql_database.database.name
        }
        env {
          name  = "DB_USERNAME"
          value = google_sql_user.user.name
        }

        env {
          name  = "DB_PASSWORD"
          value = google_sql_user.user.password
        }

        resources {
          limits = {
            memory = "1G"
            cpu    = "2"
          }
        }
      }
    }
  }

  traffic {
    percent         = 100
    latest_revision = true
  }
}

resource "google_cloud_run_service_iam_member" "invoker" {
  service = google_cloud_run_service.service.name
  location = google_cloud_run_service.service.location
  role    = "roles/run.invoker"
  member  = "allUsers"
}
