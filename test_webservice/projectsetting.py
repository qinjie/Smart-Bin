__author__ = 'zqi2'

import ConfigParser
import argparse
import requests
from requests.auth import HTTPBasicAuth
from entity import Entity


class ProjectSetting (Entity):
    # config section
    _config_section = 'project-setting'


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

    entity = ProjectSetting()

    # LIST
    entity.list(auth)

    # VIEW
    entity.view(1)

    # SEARCH
    entity.search('label=interval', auth)

    # CREATE
    data = {'project_id': '1', 'label': 'sleep', 'value': '1'}
    r = entity.create(data, auth)

    if r.status_code == 201:

        # UPDATE
        obj = r.json()
        obj['label'] = 'sleep'
        obj['value'] = '8'
        r2 = entity.update(obj, auth)

        # DELETE
        r3 = entity.delete(obj['id'], auth)

