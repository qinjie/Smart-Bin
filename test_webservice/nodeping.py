__author__ = 'zqi2'

from requests.auth import HTTPBasicAuth

from entity import Entity


class NodePing(Entity):
    # config section
    _config_section = 'node-ping'


if __name__ == '__main__':

    # # Read options from command line
    # argParser = argparse.ArgumentParser('API Entity')
    # argParser.add_argument('-c', '--configFile', help="Configuration file", required=False)
    # argParser.add_argument('-s', '--configSession', help="Configuration session", required=False)
    # argParser.add_argument('-u', '--username', help="Username", required=False)
    # argParser.add_argument('-p', '--password', help="Password", required=False)
    # args = argParser.parse_args()

    # Username and Password for Authentication
    username = 'user1'
    password = '123456'
    auth = HTTPBasicAuth(username, password)

    entity = NodePing()

    # LIST
    entity.list(auth)

    # VIEW
    entity.view(1)

    # SEARCH
    entity.search('node_id=1', auth)

    # CREATE
    data = {'node_id': '1'}
    r = entity.create(data, auth)

    if r.status_code == 201:
        obj = r.json()

        # DELETE
        r3 = entity.delete(obj['id'], auth)
