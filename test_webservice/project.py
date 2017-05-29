__author__ = 'zqi2'

import ConfigParser
import argparse
from requests.auth import HTTPBasicAuth
from entity import Entity


class Project (Entity):
    # config section
    _config_section = 'project'


if __name__ == '__main__':

    # # Read options from command line
    # argParser = argparse.ArgumentParser('API Entity')
    # argParser.add_argument('-c', '--configFile', help="Configuration file", required=False)
    # argParser.add_argument('-s', '--configSession', help="Configuration session", required=False)
    # argParser.add_argument('-u', '--username', help="Username", required=False)
    # argParser.add_argument('-p', '--password', help="Password", required=False)
    # args = argParser.parse_args()

    # Username and Password for Authentication
    username = 'manager1'
    password = '123456'
    auth = HTTPBasicAuth(username, password)

    entity = Project()

    # LIST
    entity.list(auth)

    # VIEW
    entity.view(1)

    # SEARCH
    entity.search('label=NP Recycle Bins', auth)

    # CREATE
    data1 = {'label': 'Test Recycle Bins'}
    r1 = entity.create(data1, auth)

    if r1.status_code == 201:
        # UPDATE
        obj = r1.json()
        obj['label'] = 'Test Recycle Bins 222'
        r1_2 = entity.update(obj, auth)

        # DELETE
        rd1 = entity.delete(obj['id'], auth)

