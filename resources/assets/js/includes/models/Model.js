class Model {

	constructor(resource) {
		this.resource = resource;
		this.instance = null;
		this.url = null;
	}

	new(config = {baseURL: 'http://bidder.dev'}) {
		this.instance = axios.create(config);
		return this;
	}

	setId(id, match = '{id}') {
		this.resource = this.resource.replace(match, id);
		return this;
	}

	setUrl(url) {
		this.url = url;
		return this;
	}

	get(params = {}) {
		return this.send('get', this.resource, {params});
	}

	post(data = {}) {
		return this.send('post', this.resource, data);
	}

	all() {
		return this.send('get', this.resource);
	}

	find(identifier) {
		return this.send('get', this.resource + '/' + identifier);
	}

	create(data) {
		return this.send('post', this.resource, data)
	}

	update(identifier, data) {
		
	}

	delete(identifier) {
		
	}

	send(requestType, url, config = {}) {
		return new Promise((resolve, reject) => {
			let instance = this.instance || axios;
			let path = this.url || url;

			instance[requestType](path, config)
				.then(response => {
					resolve(response.data);
				})
				.catch(error => {
					reject(error.response.data);
				});
		});
	}
}

export default Model;