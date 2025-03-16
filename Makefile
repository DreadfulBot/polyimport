SRV_PATH := '/home/httpd/vhosts/roxl.net/httpdocs/wp-content/plugins/polyimport/'

build:
	echo "Building..."

	mkdir -p build

	rsync -avzrd --stats --progress \
		--filter="merge ./rsync-filter.txt" \
		./ ./build

	(cd build && composer install --no-dev --optimize-autoloader)

cleanup:
	echo "Cleaning up..."

	rm -rf build

deploy-roxlnet:
	make build

	echo "Deploying to roxl.net..."

	rsync -avzrd --stats --progress \
		--filter="merge ./rsync-filter.txt" \
		./build/ roxl.net:${SRV_PATH}

	ssh roxl.net "cd ${SRV_PATH} && \
		mkdir -p logs && \
		chmod -R 777 logs"

	make cleanup
