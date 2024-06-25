.PHONY: build plan apply

# gcloud builds with config cloudbuild.yaml
build: 
	gcloud builds submit --config cloudbuild.yaml

plan:
	terraform plan

apply:
	terraform apply -auto-approve