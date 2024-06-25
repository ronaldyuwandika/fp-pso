# Output the public IP address of the Cloud SQL instance and the URL of the Cloud Run service
output "public_ip" {
    value = google_sql_database_instance.instance.public_ip_address 
}

# Cloud Run URL 
output "cloud_run_url" {
    value = google_cloud_run_service.service.status[0].url
}