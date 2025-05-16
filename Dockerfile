# Use official PHP image with Apache or CLI
FROM php:8.2-cli

# Install ffmpeg and dependencies
RUN apt-get update && \
    apt-get install -y ffmpeg && \
    apt-get clean

# Set working directory
WORKDIR /app

# Copy your PHP files into the container
COPY . /app

# Expose port if you want to run PHP built-in server
EXPOSE 8080

# Command to run PHP built-in server
CMD ["php", "-S", "0.0.0.0:8080"]
