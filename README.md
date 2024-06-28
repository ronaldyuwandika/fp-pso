## How to deploy with local computer (Manual)

### Step 1
Clone from this repository "fp-sisop"
### Step 2
Make Docker file that satisfy both your source code and the virtual private server
### Step 3
Make Terraform that satify both your source code and the virtual private server
> Make sure your URL name the same as domain name
```
env {
            name = "APP_URL"
            value = "https://itsparking-6azj6n3oaq-et.a.run.app"
        }
```
### Step 4
Run `make` in your terminal, this will run series of command in your terminal.

### What is inside makefile?
```
.PHONY: build plan apply
```
-Declares build, plan, and apply as phony targets in a Makefile. Phony targets are not actual files but rather commands to be executed.

```
build:
```
- Defines the build target.

```
	gcloud builds submit --config cloudbuild.yaml

```
- Command to submit a build to Google Cloud Build using the configuration specified in `cloudbuild.yaml`.

```
plan:
```
- Defines the plan target.

```
	terraform plan

```
- Command to generate and show an execution plan for Terraform, detailing what actions will be taken to reach the desired state.

```
apply:
```
-Defines the apply target.

```
	terraform apply -auto-approve
```
-Command to apply the changes required to reach the desired state of the configuration, automatically approving any prompts without manual intervention.


## How to deploy with Github action (CI/CD)
(The use case is using Google Cloud Service)

### Step 1 
 Generate key in service account in "I am Admin", and make sure that your service account have access to your instance
> Make sure you minify (make the key in one line) the key because the github secret engine is unable to read a key with space break
### Step 2 
 Upload your key to Github Secrets 
> Make sure that you name the keyname in Github Secrets same as the one in .github/workflows

### Step 3
Setup your environment in Github Secrets with 

 ```
PROJECT_ID: fp-sisop
REGION: asia-southeast2
 GAR_LOCATION: asia-southeast2-docker.pkg.dev/fp-sisop/itsparking/itsparking:latest
```
PROJECT_ID: fp-sisop

- PROJECT_ID: This specifies the identifier for your Google Cloud project.
fp-sisop: This is the unique identifier for your project within Google Cloud. In this case, it appears to be a project named "fp-sisop."
REGION: asia-southeast2

- REGION: This denotes the region where your resources will be deployed or are located.
asia-southeast2: This is the specific region in Google Cloud, which typically corresponds to a geographical area. Here, it represents the Southeast Asia region.
GAR_LOCATION: asia-southeast2-docker.pkg.dev/fp-sisop/itsparking/itsparking:latest

- GAR_LOCATION: This likely stands for "Google Artifact Registry Location," which is the URL pointing to a specific container image stored in Google Artifact Registry.
asia-southeast2-docker.pkg.dev: This part of the URL indicates that the Artifact Registry is located in the asia-southeast2 region.
fp-sisop: This is the name of the project within which the Artifact Registry is organized.
itsparking/itsparking:latest: This specifies the repository and the image within the Artifact Registry. itsparking is the name of the repository, and itsparking:latest refers to the image named itsparking with the latest tag, indicating the most recent version of this image.

### Step 4
 Continue your development and when you are finished just simply push your source code to `main`. This will automatically trigger github action to deploy and test in your google cloud run then  your code will eventually be accessible to public
