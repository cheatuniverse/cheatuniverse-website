import Cookies from 'js-cookie';

export abstract class AbstractStorage {
  key = '';

  get() {
    return Cookies.get(this.key);
  }

  set(value: string) {
    Cookies.set(this.key, value);
  }

  remove() {
    Cookies.remove(this.key);
  }
}
